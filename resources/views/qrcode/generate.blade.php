<x-layout>
    <x-slot:title>
        {{$title}}
    </x-slot:title>

    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="row flex justify-center flex-col items-center justify-center">
            <h1 class="font-semibold text-3xl mb-3">tamudesa.id</h1>
            {{QrCode::generate("https://tamudesa.id/form/$qrcode->village_code/" . $qrcode->village->name)}}
            <p class="w-[250px] my-2 text-center">Desa {{$qrcode->village->name}},Kecamatan {{$qrcode->subdistrict->name}},{{$qrcode->district->name}}</p>
        </div>
    </div>
    <script>
        window.print();
    </script>
</x-layout>