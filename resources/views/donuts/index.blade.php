<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donut List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center min-h-screen p-6"
    style="background-image: url('https://w0.peakpx.com/wallpaper/477/865/HD-wallpaper-food-strawberry-cherry-dessert-blueberry-cake-fruit-pastry.jpg');">

    <h1 class="text-3xl font-bold mb-6 text-center text-white">🍩 Donuts 🍩</h1>

    <div class="flex flex-col gap-4 max-w-2xl mx-auto">
        @foreach($donuts as $donut)
        
        <div 
            onclick="alert('Da Habis, Besok dtg awal skit <3')"
            class="cursor-pointer bg-white p-4 rounded-xl shadow hover:shadow-lg transition hover:bg-gray-200"
        >
            <h2 class="text-xl font-semibold">{{ $donut->name }} </h2>
            <p class="text-sm text-gray-600">Type: {{ $donut->type }}</p>
            <p class="text-sm text-gray-600">PPU: ${{ $donut->ppu }}</p>

            <div class="mt-2">
                <h3 class="text-sm font-medium">Batters:</h3>
                <ul class="text-sm list-disc ml-5">
                    @foreach ($donut->batters as $batter)
                        <li>{{ $batter->type }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-2">
                <h3 class="text-sm font-medium">Toppings:</h3>
                <ul class="text-sm list-disc ml-5">
                    @foreach ($donut->toppings as $topping)
                        <li>{{ $topping->type }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>

</body>
</html>
