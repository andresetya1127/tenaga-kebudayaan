try {
    document.querySelectorAll(".select-tags").forEach((el) => {
        var tags = new TomSelect(el, {
            plugins: ["remove_button"],
            create: false,
            maxItems: 5,
            maxOptions: 300,
            hideSelected: true,
            duplicates: false,
        });
    });
} catch (error) {}

try {
    document.querySelectorAll(".select-options").forEach((el) => {
        var opt = new TomSelect(el, {
            create: true,
        });
    });
} catch (error) {}

$(".select2").select2({
    theme: "bootstrap-5",
});
