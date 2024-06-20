document.addEventListener("livewire:init", (data) => {
    document.addEventListener("livewire:initialized", () => {
        $(".summernote").summernote({
            tabsize: 2,
            height: 180,
            toolbar: [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["font", ["strikethrough", "superscript", "subscript"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]],
            ],
        });
    });
});
