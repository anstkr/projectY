<?php
require_once 'App/Domain/Users/UserEntity.php'; use App\Domain\Users\UserEntity;

$user = new UserEntity();
if (!$user->isAdmin) die('Доступ закрыт');
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row row-header">
            <h1>Админка</h1>
        </div>
        <div class="row row-form">
            <div class="col-12">
                <form action="App/Application/AdminService.php" method="POST" id="form">
                    <label for="name" class="form-label">Название:</label>
                    <input type="text" name="name" class="form-control" id="name" min="1" max="100">
                    <label for="price" class="form-label">Цена:</label>
                    <input type="number" name="price" class="form-control" id="price" min="1">
                    <h6 class="mt-2">Тариф:</h6>
                    <input type="hidden" name="tarif" class="form-control" id="tarif-input">
                    <div class="list-group mb-2" id="tarif-list"></div>  
                    <div class="d-flex align-items-center justify-content-start gap-3">
                        <div>
                            <label for="day" class="form-label">День:</label>
                            <input type="number" name="day" class="form-control" id="day">
                        </div>
                        <div>
                            <label for="price-day" class="form-label">Цена:</label>
                            <input type="number" name="price-day" class="form-control" id="price-day">
                        </div>
                        <button type="button" class="btn btn-secondary mt-2 align-self-end" id="tarif-btn">Добавить тариф</button>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить товар</button>
                </form>
            </div>
        </div>
        <h5 id="status"></h5>
    </div>

    <script src="assets/js/addTarif.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form").submit(function(event) {
                event.preventDefault();
                var $form = $(this);
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $("#status").text(response);
                    },
                    error: function() {
                        $("#status").text('Ошибка заполнения формы!');
                    }
                });
            });
        });
    </script>
</body>
</html>