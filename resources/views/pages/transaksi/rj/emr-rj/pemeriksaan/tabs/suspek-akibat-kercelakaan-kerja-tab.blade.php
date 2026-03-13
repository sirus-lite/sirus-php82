{{-- SUSPEK AKIBAT KERJA --}}
<div class="mb-2">
    <x-input-label for="dataDaftarPoliRJ.pemeriksaan.suspekAkibatKerja.keteranganSuspekAkibatKerja" :value="__('Suspek Penyakit Akibat Kecelakaan Kerja')"
        :required="__(false)" />

    <div class="grid grid-cols-3 gap-2 mb-2">
        @foreach ($dataDaftarPoliRJ['pemeriksaan']['suspekAkibatKerja']['suspekAkibatKerjaOptions'] ?? [] as $suspekAkibatKerjaOption)
            <x-radio-button :label="__($suspekAkibatKerjaOption['suspekAkibatKerja'])" :value="$suspekAkibatKerjaOption['suspekAkibatKerja']" name="suspekAkibatKerja"
                wire:model.live="suspekAkibatKerja" :disabled="$isFormLocked" />
        @endforeach

        <x-text-input id="keteranganSuspekAkibatKerja" placeholder="Keterangan" class="mt-1 ml-2" :error="$errors->has('dataDaftarPoliRJ.pemeriksaan.suspekAkibatKerja.keteranganSuspekAkibatKerja')"
            :disabled="$isFormLocked ?? false"
            wire:model.live="dataDaftarPoliRJ.pemeriksaan.suspekAkibatKerja.keteranganSuspekAkibatKerja" />
        <x-input-error :messages="$errors->get('dataDaftarPoliRJ.pemeriksaan.suspekAkibatKerja.keteranganSuspekAkibatKerja')" class="mt-1" />
    </div>
</div>
