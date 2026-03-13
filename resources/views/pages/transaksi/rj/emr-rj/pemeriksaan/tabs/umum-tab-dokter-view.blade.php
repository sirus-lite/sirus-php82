<div class="pt-0">
    {{-- TANDA VITAL --}}
    <div>
        <x-input-label :value="__('Keadaan Umum')" class="pt-2 sm:text-xl" />
        <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
            {{ $dataDaftarPoliRJ['pemeriksaan']['tandaVital']['keadaanUmum'] ?? '-' }}
        </p>

        <x-input-label :value="__('Tingkat Kesadaran')" class="pt-2" />
        <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
            {{ $dataDaftarPoliRJ['pemeriksaan']['tandaVital']['tingkatKesadaran'] ?? '-' }}
        </p>

        <x-input-label :value="__('Tanda Vital')" class="pt-2 sm:text-xl" />

        <x-input-label :value="__('Tekanan Darah')" class="pt-2" />
        <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
            {{ $dataDaftarPoliRJ['pemeriksaan']['tandaVital']['sistolik'] ?? '-' }} mmHg
            /
            {{ $dataDaftarPoliRJ['pemeriksaan']['tandaVital']['distolik'] ?? '-' }} mmHg
        </p>

        <div class="grid grid-cols-2 gap-2 pt-2">
            <div>
                <x-input-label :value="__('Frekuensi Nadi')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['tandaVital']['frekuensiNadi'] ?? '-' }} X/Menit
                </p>
            </div>
            <div>
                <x-input-label :value="__('Frekuensi Nafas')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['tandaVital']['frekuensiNafas'] ?? '-' }} X/Menit
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2 pt-2">
            <div>
                <x-input-label :value="__('Suhu')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['tandaVital']['suhu'] ?? '-' }} °C
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2 pt-2">
            <div>
                <x-input-label :value="__('SPO2')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['tandaVital']['spo2'] ?? '-' }} %
                </p>
            </div>
            <div>
                <x-input-label :value="__('GDA')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['tandaVital']['gda'] ?? '-' }} g/dl
                </p>
            </div>
        </div>
    </div>

    {{-- NUTRISI --}}
    <div>
        <x-input-label :value="__('Nutrisi')" class="pt-2 sm:text-xl" />

        <div class="grid grid-cols-3 gap-2 pt-2">
            <div>
                <x-input-label :value="__('Berat Badan')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['nutrisi']['bb'] ?? '-' }} Kg
                </p>
            </div>
            <div>
                <x-input-label :value="__('Tinggi Badan')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['nutrisi']['tb'] ?? '-' }} Cm
                </p>
            </div>
            <div>
                <x-input-label :value="__('Index Masa Tubuh')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['nutrisi']['imt'] ?? '-' }} Kg/M2
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2 pt-2">
            <div>
                <x-input-label :value="__('Lingkar Kepala')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['nutrisi']['lk'] ?? '-' }} Cm
                </p>
            </div>
            <div>
                <x-input-label :value="__('Lingkar Lengan Atas')" />
                <p class="mt-1 ml-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['pemeriksaan']['nutrisi']['lila'] ?? '-' }} Cm
                </p>
            </div>
        </div>
    </div>

</div>
