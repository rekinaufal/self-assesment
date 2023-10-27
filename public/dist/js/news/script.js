let allNews = null;

$(document).ready(() => {
    $('#createNewsModal').on('hidden.bs.modal', function () {
        $('#my-dropzone')[0].reset();
        $('#id').val("");
        // $(".dropzone-hint, .dropzone-has-uploaded").toggleClass("d-flex d-none");
        $(".dropzone-hint").removeClass("d-none");
        $(".dropzone-hint").addClass("d-flex");
        $(".dropzone-has-uploaded").removeClass("d-flex");
        $(".dropzone-has-uploaded").addClass("d-none");
    });

    fetchData(); // Fetch data when the document is ready

    const storedSelectedNews = JSON.parse(sessionStorage.getItem('selectedNews')) || [];

    const updateSelectedNews = () => {
        const selectedNewsInPage = $('.checkbox-news').map(function () {
            return {
                id: $(this).data('id'),
                isChecked: this.checked
            };
        }).get();

        const newSelectedNews = storedSelectedNews.filter(pageNews => pageNews[0].id !==
            selectedNewsInPage[0].id);
        newSelectedNews.push(selectedNewsInPage);

        sessionStorage.setItem('selectedNews', JSON.stringify(newSelectedNews));
    };

    storedSelectedNews.forEach(pageNews => pageNews.forEach(({
        id,
        isChecked
    }) => {
        $(`.checkbox-news[data-id="${id}"]`).prop('checked', isChecked);
    }));

    $('.checkbox-news').change(updateSelectedNews);

    $('#deleteSelectedNews').click(() => {
        let deleteSelectedNews = JSON.parse(sessionStorage.getItem('selectedNews')) || []
        let canDelete = false;
        let deleteIds = [];
        if (deleteSelectedNews.length > 0) {
            for (let i = 0; i < deleteSelectedNews.length; i++) {
                let hasSelectedNews = deleteSelectedNews[i].filter(f => f.isChecked === true);
                if (hasSelectedNews.length > 0) {
                    canDelete = true;
                    hasSelectedNews.forEach((news) => {
                        deleteIds.push(news.id);
                    });
                }
            }

            if (!canDelete) {
                swal({
                    title: "Error",
                    text: "Can't deleted batch. Nothing news is selected",
                    icon: "error",
                    button: false,
                    timer: 2500
                })
            } else {
                deleteIds = JSON.stringify(deleteIds);
                $('#newsWantDelete').val(deleteIds);

                $('#formDeleteBatch').submit();
            }
        } else {
            swal({
                title: "Error",
                text: "Can't deleted batch. Nothing news is selected",
                icon: "error",
                button: false,
                timer: 2500
            })
        }
    })
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

function editNews(id) {
    if (allNews != null) {
        let news = allNews.find(news => news.id == id);
        $("#id, #title, #description, #link").val(function () {
            return news[this.id];
        });

        $(".dropzone-hint").addClass("d-none");
        $(".dropzone-hint").removeClass("d-flex");
        $(".dropzone-has-uploaded").removeClass("d-none");
        $(".dropzone-has-uploaded").addClass("d-flex");

        $("#createNewsModal").modal("show");
    } else {
        swal({
            icon: "warning",
            title: "Data has not fully loaded",
            text: "Please try again after the alert is closed.",
            button: false,
            timer: 3000
        });
    }
}
