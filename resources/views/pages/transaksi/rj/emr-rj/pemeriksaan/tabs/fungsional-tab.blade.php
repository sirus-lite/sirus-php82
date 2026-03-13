{{-- FUNGSIONAL --}}
<div>
    <x-input-label for="dataDaftarPoliRJ.pemeriksaan.fungsional.alatBantu" :value="__('Fungsional')" :required="__(false)"
        class="pt-2 sm:text-xl" />

    <div class="grid grid-cols-3 gap-2 pt-2">
        <div class="mb-2">
            <x-input-label for="dataDaftarPoliRJ.pemeriksaan.fungsional.alatBantu" :value="__('Alat Bantu')"
                :required="__(false)" />
            <x-text-input id="dataDaftarPoliRJ.pemeriksaan.fungsional.alatBantu" placeholder="Alat Bantu"
                class="mt-1 ml-2" :error="$errors->has('dataDaftarPoliRJ.pemeriksaan.fungsional.alatBantu')" :disabled="$isFormLocked"
                wire:model.live="dataDaftarPoliRJ.pemeriksaan.fungsional.alatBantu" />
            <x-input-error :messages="$errors->get('dataDaftarPoliRJ.pemeriksaan.fungsional.alatBantu')" class="mt-1" />
        </div>

        <div class="mb-2">
            <x-input-label for="dataDaftarPoliRJ.pemeriksaan.fungsional.prothesa" :value="__('Prothesa')"
                :required="__(false)" />
            <x-text-input id="dataDaftarPoliRJ.pemeriksaan.fungsional.prothesa" placeholder="Prothesa"
                class="mt-1 ml-2" :error="$errors->has('dataDaftarPoliRJ.pemeriksaan.fungsional.prothesa')" :disabled="$isFormLocked"
                wire:model.live="dataDaftarPoliRJ.pemeriksaan.fungsional.prothesa" />
            <x-input-error :messages="$errors->get('dataDaftarPoliRJ.pemeriksaan.fungsional.prothesa')" class="mt-1" />
        </div>

        <div class="mb-2">
            <x-input-label for="dataDaftarPoliRJ.pemeriksaan.fungsional.cacatTubuh" :value="__('Cacat Tubuh')"
                :required="__(false)" />
            <x-text-input id="dataDaftarPoliRJ.pemeriksaan.fungsional.cacatTubuh" placeholder="Cacat Tubuh"
                class="mt-1 ml-2" :error="$errors->has('dataDaftarPoliRJ.pemeriksaan.fungsional.cacatTubuh')" :disabled="$isFormLocked"
                wire:model.live="dataDaftarPoliRJ.pemeriksaan.fungsional.cacatTubuh" />
            <x-input-error :messages="$errors->get('dataDaftarPoliRJ.pemeriksaan.fungsional.cacatTubuh')" class="mt-1" />
        </div>
    </div>
</div>