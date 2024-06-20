var drE = $(".dropify").dropify({
    messages: {
        default: "Seret dan letakkan file di sini atau klik",
        replace: "Seret dan lepas atau klik untuk mengganti",
        remove: "Hapus",
        error: "Terjadi kesalahan saat upload.",
    },
    error: {
        fileSize: "Ukuran file terlalu besar maximal.({{ value }}).",
        minWidth: "The image width is too small ({{ value }}}px min).",
        maxWidth: "The image width is too big ({{ value }}}px max).",
        minHeight: "The image height is too small ({{ value }}}px min).",
        maxHeight: "The image height is too big ({{ value }}px max).",
        imageFormat: "Jenis gambar tidak sesuai ({{ value }}).",
        fileExtension: "Jenis file tidak sesuai ({{ value }})",
    },
});

document.addEventListener("livewire:init", () => {
    Livewire.on("dropify-complete", (event) => {
        $(".dropify").each(function () {
            var drEvent = $(this).data("dropify"); // Dapatkan instance Dropify
            drEvent.resetPreview(); // Reset pratinjau
            drEvent.clearElement(); // Bersihkan elemen
        });
    });
});
