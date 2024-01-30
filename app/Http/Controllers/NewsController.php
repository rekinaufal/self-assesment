<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private static $pageTitle = "News";
    private static $uploadsFolder = "news";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = $request->input('perpage', 6);
        $data = [
            "pageTitle" => self::$pageTitle,
            "news" => News::latest()->paginate($perpage)->appends(["perpage" => $perpage]),
            "perpage" => $perpage
        ];

        return view("news.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            "title" => "required",
            "description" => "required|max:255",
            "link" => "required|url:http,https",
            "thumbnail" => $request->id == null ? "required|image" : "image"
        ]);

        unset($credentials["thumbnail"]);

        if ($request->thumbnail != null) {
            // save image
            $filename = 'news-thumbnail-' . date("YmdHis") . '.' . $request->thumbnail->extension();
            $thumbnailPath = $request->thumbnail->storeAs(self::$uploadsFolder, $filename, 'modules');

            $credentials["thumbnail"] = $thumbnailPath;
        }

        // Melakukan penggantian kutipan ganda dengan kutipan tunggal
        $credentials["description"] = str_replace('"', "'", $credentials["description"]);

        if ($request->id == null) {
            $createdNews = News::create($credentials);
        } else {
            $news = News::find($request->id);
            if (!$news) return redirect()->route("news.index")->with("failed", "User dengan id = " . $request->id . "tidak ada");

            $updatedNews = $news->update($credentials);
        }


        if ((isset($createdNews) && !$createdNews) || (isset($updatedNews) && !$updatedNews)) return redirect()->route("news.index")->with("failed", "Gagal simpan berita.");

        return redirect()->route("news.index")->with("success", "Berhasil simpan berita.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        if ($news) {
            $userLogged = auth()->user();
            $user = UserProfile::where('user_id', $userLogged->id)->first();
            return view("news.detail", compact('news', 'user'));
        } else {
            return redirect()->back()->with('failed', 'Tidak dapat menemukan berita tersebut');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $deletedNews = $news->delete();

        if (!$deletedNews) abort(500, "Internal Server Error");

        return redirect()->route("news.index")->with("success", "Data berita berhasil dihapus");
    }

    public function getNewsJson()
    {
        $news = News::all();

        if (!$news) abort(404, "Not found news");

        return response()->json($news);
    }

    public function deletedBatch(Request $request)
    {
        $deleteIds = json_decode($request->delete_ids);

        $deletedNews = News::whereIn('id', $deleteIds)->delete();
        // dd($deleteIds);
        if (!$deletedNews) {
            return redirect()->route("news.index")->with("failed", "Gagal menghapus yang telah dipilih!");
        }

        return redirect()->route("news.index")->with("success", "Berhasil menghapus berita yang dipilih!");
    }

    public function search(Request $request)
    {
        $perpage = $request->input('perpage', 6);
        $fromDate = $request->input('from_date');
        $untilDate = $request->input('until_date');

        // validation
        if ($fromDate && $untilDate && strtotime($fromDate) > strtotime($untilDate)) {
            return redirect()->route("news.index")->with("failed", "Tanggal sampai harus sama dengan atau setelah tanggal dari.");
        }

        $query = News::latest();

        // Apply date filter if provided
        if ($fromDate) {
            $query->where('created_at', '>=', $fromDate);
        }

        if ($untilDate) {
            $query->where('created_at', '<=', $untilDate);
        }

        // Retrieve paginated news data
        $news = $query->paginate($perpage)->appends(["perpage" => $perpage]);

        $data = [
            "pageTitle" => self::$pageTitle,
            "news" => $news,
            "perpage" => $perpage,
            "fromDate" => $fromDate,
            "untilDate" => $untilDate,
        ];

        return view('news.index', $data);
    }
}
