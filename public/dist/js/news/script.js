let allNews = null;
const storedSelectedNews = JSON.parse(sessionStorage.getItem('selectedNews')) || [];

$(document).ready(() => {
    $('#createNewsModal').on('hidden.bs.modal', resetCreateNewsForm);

    fetchData();

    storedSelectedNews.forEach(pageNews => pageNews.forEach(({ id, isChecked }) => {
        $(`.checkbox-news[data-id="${id}"]`).prop('checked', isChecked);
        hasSelectedNews();
    }));

    $('.checkbox-news').change(updateSelectedNews);
    $('#deleteSelectedNews').click(handleDeleteSelectedNews);
    $("#uncheckAll, #checkAll").click(handleCheckUncheck);
});

async function fetchData() {
    try {
        const response = await fetch('/json/news');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        allNews = await response.json();
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}

function updateSelectedNews() {
    const selectedNewsInPage = $('.checkbox-news').map(function () {
        return {
            id: $(this).data('id'),
            isChecked: this.checked
        };
    }).get();

    const newSelectedNews = storedSelectedNews.filter(pageNews => pageNews[0].id !== selectedNewsInPage[0].id);
    newSelectedNews.push(selectedNewsInPage);

    sessionStorage.setItem('selectedNews', JSON.stringify(newSelectedNews));
    hasSelectedNews();
}

function handleDeleteSelectedNews() {
    const deleteSelectedNews = JSON.parse(sessionStorage.getItem('selectedNews')) || [];
    let canDelete = false;
    let deleteIds = [];

    for (let i = 0; i < deleteSelectedNews.length; i++) {
        let hasSelectedNews = deleteSelectedNews[i].filter(f => f.isChecked === true);
        if (hasSelectedNews.length > 0) {
            canDelete = true;
            hasSelectedNews.forEach((news) => deleteIds.push(news.id));
        }
    }

    if (!canDelete) {
        showErrorMessage("Can't delete batch. Nothing news is selected");
    } else {
        swal({
            title: "Warning",
            text: `${deleteIds.length} news has checked, are you sure want to delete it?`,
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                deleteIds = JSON.stringify(deleteIds);
                $('#newsWantDelete').val(deleteIds);
                $('#formDeleteBatch').submit();
            }
        });
    }
}

function handleCheckUncheck() {
    sessionStorage.removeItem("selectedNews");

    if ($(this).attr("id") === "checkAll") {
        let mappingNews = allNews.map((item) => ({ id: item.id, isChecked: true }));
        let newMappingNews = [];

        for (let i = 0; i < mappingNews.length; i += 6) {
            newMappingNews.push(mappingNews.slice(i, i + 6));
        }

        sessionStorage.setItem("selectedNews", JSON.stringify(newMappingNews));
    }
    location.reload();
}

function resetCreateNewsForm() {
    $('#my-dropzone')[0].reset();
    $('#id').val("");
    $(".dropzone-hint").addClass("d-flex");
    $(".dropzone-hint").removeClass("d-none");
    $(".dropzone-has-uploaded").addClass("d-none");
    $(".dropzone-has-uploaded").removeClass("d-flex");
}

function showErrorMessage(message) {
    swal({
        title: "Error",
        text: message,
        icon: "error",
        button: false,
        timer: 2500
    });
}

function editNews(id) {
    if (allNews != null) {
        let news = allNews.find(news => news.id == id);
        $("#id").val(news.id);
        $("#title").val(news.title);
        // $("#description").val(news.description);
        CKEDITOR.replace('description');
        CKEDITOR.instances.description.setData(news.description);
        $("#link").val(news.link);
        $(".dropzone-hint, .dropzone-has-uploaded").toggleClass("d-flex d-none");
        $("#createNewsModal").modal("show");
    } else {
        showErrorMessage("Data has not fully loaded. Please try again after the alert is closed.");
    }
}

function hasSelectedNews() {
    const storedSelectedNews = JSON.parse(sessionStorage.getItem('selectedNews')) || [];
    let hasSelectedNews = storedSelectedNews.some(selectedNews => selectedNews.some(news => news.isChecked == true));
    if (hasSelectedNews) {
        $("#dropdownSelectedAction").removeClass("d-none");
    } else {
        $("#dropdownSelectedAction").addClass("d-none");
    }
}
