document.addEventListener("livewire:init", () => {
    Livewire.on("alert-confirm", (event) => {
        Swal.fire({
            title: event.icon,
            text: event.text ?? event.title,
            icon: event.icon,
            showCancelButton:
                event.icon !== "error" && event.title ? true : false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ok!",
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result) => {
            if (event.icon == "success") {
                if (result.isConfirmed) {
                    window.location.href = event.rute;
                } else {
                    window.location.reload();
                }
            }
        });
    });

    Livewire.on("sweat-alert", (event) => {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });
        Toast.fire({
            icon: event.icon,
            title: event.title,
        });
    });
});
