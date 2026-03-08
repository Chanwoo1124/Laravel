<html>
    <head>
        @vite(['resources/css/app.css', "resources/js/app.js"])
    </head>
    <body>
        <div class="container p-5">
            <h1 class="container p-5">글쓰기</h1>
            <form action="/aricles" method="POST">
                <input type="text" class="block w-full mb-2 rounded">
                <input type="button" value="저장하기" class="py-1 px-3 bg-black text-white rounded text-xs">
            </form>
        </div>
    </body>
</html>
