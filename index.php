<?include 'db.php';ini_set('display_errors','On');
error_reporting('E_ALL');?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">    
    <title>Mail IQ</title>
    <link rel="stylesheet" href="libr/bootstrap.min.css">
    <script src="libr/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <h3>#HEADER</h3>
        </div>
    </header>
    <section>
        <div class="container">
            <h2>ОПРОС:</h2>
            <form action="" method="POST" id="ajax-form">
                <div class="card col">
                    <div class="card-body form-check">
                        <div class="card-title">Вопрос: Что добавляет возраст?</div>
                        <div class="card-text">Варианты:</div>
                        <input type="radio" name="ask1" id="classic_style" value="classic_style" checked > <label for="classic_style">Чистый классический стиль</label><br>
                        <input type="radio" name="ask1" id="sport_style" value="sport_style" > <label for="sport_style">Чистый спортивный стиль</label> <br>
                        <input type="radio" name="ask1" id="classic_and_sport_style" value="classic_and_sport_style" > <label for="classic_and_sport_style">Смесь классики и спорта</label>  <br>
                    </div>
                </div>
                <div class="card col">
                    <div class="card-body">
                        <div class="card-title">Вопрос: Стоит ли взрослой женщине одеться полностью в романтичном стиле?</div>
                        <div class="card-text">Варианты:</div>
                        <input type="radio" name="ask2" id="yes" value="yes" checked > <label for="yes">Да, особенно когда идешь на свидание</label>  <br>
                        <input type="radio" name="ask2" id="no" value="no" > <label for="no">Нет, это будет выглядеть глупо. Надо добавлять долю романтики к другим стилям </label> <br>
                        <input type="radio" name="ask2" id="maybe" value="maybe" > <label for="maybe">Можно, если такой образ был на манекене</label> <br>
                    </div>
                </div>
                <div class="card col">
                    <div class="card-body">
                        <div class="card-title">Вопрос: Как включать тренды в свой гардероб? </div>
                        <div class="card-text">Варианты:</div>
                        <input type="radio" name="ask3" id="razobratsya" value="razobratsya" checked > <label for="razobratsya">Разобраться с долгими и короткими трендами. Долгих трендов брать чуть побольше. Коротких - на один сезон, чтобы сделать образы острыми и интересными</label> <br>
                        <input type="radio" name="ask3" id="ne_trogat" value="ne_trogat" > <label for="ne_trogat">Не трогать тренды - в них тяжело разобраться, подходит только молодежи, зачем позориться</label> <br>
                        <input type="radio" name="ask3" id="smotret" value="smotret" > <label for="smotret">Смотреть модные показы и полностью копировать понравившиеся образы с подиумов</label> <br>
                    </div>
                </div>
                <div class="send">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Имя</span>
                        </div>
                        <input type="text" class="form-control" name="name" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Почта</span>
                        </div>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Mail" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" placeholder="Отправить">
                </div>
                
            </form>
        </div>
    </section>
    <footer>
        <div class="container">
            <?
                if(isset($data['submit'])) {
                    $results = array();
                    if ($_POST['classic_style']) {
                        $results[] = "Первый вопрос решён правильно";
                    }
                    else{
                        $results[] = "Первый вопрос решён не правильно";
                    }
                    if ($_POST['no']){
                        $results[] = "Второй вопрос решён правильно";
                    }
                    else{
                        $results[] = "Второй вопрос решён не правильно";
                    }
                    if ($_POST['razobratsya']){
                        $results[] = "Третий вопрос решён правильно";
                    }
                    else {
                        $results[] = "Третий вопрос решён не правильно";
                    }
                    echo $results;                  
                }
                return false;
            ?>
            <div id="result"></div>
            <script>
                $('#ajax-form').submit(function(e) {
                    e.preventDefault();
                    var method = $(this).attr('method');
                    var url = $(this).attr('url');
                    $[method](url, $(this).serialize(), function(data) {
                        $('#result').html(data);
                    });
                });
            </script>
        </div>
    </footer>
</body>
</html>