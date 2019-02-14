<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>


<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">todo登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">todo登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">todo一覧</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="book_form">
        <input type="text" class="" id="retrieval" name='retrieval' width="" placeholder="プログラミング">
        <button type="submit" class="btn btn-primary" id="btn">検索する</button>
    </div>
    <form action='insert.php' method='post'>
        <div class="form-group">
            <label for="name">本のタイトル</label>
            <select id="output1" class="form-control" name="name"></select>
            <!-- <input type="text" class="form-control" id="name" name='name'> -->
        </div>
        <div class="form-group">
            <label for="url">本のURL</label>
            <input type="text" class="form-control" id="url" name='url'>
            <!-- <select id="output2" class="form-control" name="url"></select> -->
            <!-- <input type="text" class="form-control" id="url" name='url'> -->
        </div>
        <div class="form-group">
            <label for="comment">感想</label>
            <textarea class="form-control" id="comment" name='comment' rows="3"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        const url = 'https://www.googleapis.com/books/v1/volumes?q=プログラミング';

        $('#btn').on('click', function() {
            // $.getJSON(url).done('title', 'authors', 'selflink') {
            //     var str = '';
            // }

            // $('#output').html(str);
            let data = '';
                $.getJSON(url)
                .done(function(response){
                    console.log(response);
                    for(var i=0;i<response.items.length;i++){
                        data = response;
                        const title = response.items[i].volumeInfo.title;
                        const url = response.items[i].selfLink;
                        console.log(title);
                        $('#output1').append(`<option id="${i}" class="option" name="${title}" value="${title}">${title}</option>`);
                        // $('#output2').append(`<option name="${url}">${url}</option>`);
                    }
                })
                .fail(function(){
                    console.log('ng');
                })
                .always(function(){
                    console.log('finished');
                });

            $('#output1').on('change',function(){
                const a = $(this).val();
                console.log(a);
                const b = $(`select#output1 option[value="${a}"]`).attr('id');
                console.log(b);
                $('#url').val(data.items[b].selfLink);
            });
        });
    
    </script>

</body>

</html>