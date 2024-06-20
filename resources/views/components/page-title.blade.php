@props(['page' => false, 'disload' => false, 'icon' => false])

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="{{ $icon ?? false ? $icon : 'pe-7s-car' }} icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>
                <span class="text-capitalize"> {{ $page ?? false ? $page : '' }}</span>
                @if (!$disload)
                    <div class="page-title-subheading">
                        <div wire:loading>
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status">Tunggu Sebentar...</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
