<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bs-primary: #772E72;
            --bs-primary-rgb: 119, 46, 114;
        }

        .btn-primary {
            --bs-btn-bg: #772E72;
            --bs-btn-border-color: #772E72;
            --bs-btn-hover-bg: #5f245c;
            --bs-btn-hover-border-color: #5f245c;
        }

        .card-available {
            border-left: 4px solid #772E72;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4 text-center">Hasil Pencarian</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Room Card 1 -->
            @foreach ($rooms as $room)
                <div class="col">
                    <div class="card card-available h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $room->image) }}" class="card-img-top" alt="Meeting Room A">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <p class="card-text"><strong>Status:</strong> <span class="badge bg-success">Tersedia</span>
                            </p>
                            <p class="card-text"><strong>Kapasitas:</strong> {{ $room->capacity }}</p>
                            <p class="card-text"><strong>Deskripsi:</strong> {{ $room->description }}</p>
                            <a href="{{ route('roomlist.edit', $room->id) }}" class="btn btn-primary mt-2">Pinjam
                                Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
