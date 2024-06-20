document.addEventListener("livewire:navigated", () => {
    let table = $(".data-table").DataTable({
        responsive: true,
        language: {
            emptyTable: "<p class='text-center'>Belum Ada Data..</p>",
            zeroRecords: "<p class='text-center'>Data Tidak Ditemukan.</p>",
        },
        pagingType: "full_numbers",
        dom: 'rt<"bottom d-flex justify-content-between mt-2"ip><"clear">',
    });

    $(".search-input").on("keyup", function () {
        table.search(this.value).draw();
    });

    $(".search-select").on("change", function () {
        table.search(this.value).draw();
    });

    $(".table-click tbody").on("click", "tr", function () {
        url = $(this).attr("data-url");

        window.location.href = url;
    });
});
