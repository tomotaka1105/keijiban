<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
    <?php
    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    $stmt = $pdo->query("select * from 4each_keijiban");
    ?>
    <header>
      <img src="4eachblog_logo.jpg" class="header_img">
      <div class="header_menu">
        <p class="header_contents">トップ</p>
        <p class="header_contents">プロフィール</p>
        <p class="header_contents">4eachについて</p>
        <p class="header_contents">登録フォーム</p>
        <p class="header_contents">問い合わせ</p>
        <p class="header_contents">その他</p>
      </div>
    </header>
    <main>
      <div class="main_contents">
        <h1>プログラミングに役立つ掲示板</h1>
        <form method="post" action="insert.php" class="form">
          <div>
            <label>ハンドルネーム</label>
            <br>
            <input type="text" class="text" size="35" name="handlename">
          </div>
          <div>
            <label>タイトル</label>
            <br>
            <input type="text" class="text" size="35" name="title">
          </div>
          <div>
            <label>コメント</label>
            <br>
            <textarea name="comments" rows="7" cols="35"></textarea>
          </div>
          <div>
            <input type="submit" value="投稿する" class="submit">
          </div>
        </form>
        <?php
        while ($row = $stmt->fetch()){
          echo "<div class='kiji'>";
            echo "<h3>".$row['title']."</h3>";
            echo "<div class='contents'>";
              echo $row['comments'];
              echo "<div class='handlename'>posted by".$row['handlename']."</div>";
            echo "</div>";
          echo "</div>";
        }
        ?>
      </div>
      <div class="sidebar">
        <div class="popular">
          <h2 class="side_contents">人気の記事</h2>
          <ul>
            <li class="side_list">PHPオススメ本</li>
            <li class="side_list">PHP MyAdminの使い方</li>
            <li class="side_list">今人気のエディタ Top5</li>
            <li class="side_list">HTMLの基礎</li>
          </ul>
        </div>
        <div class="recommend">
          <h2 class="side_contents">オススメリンク</h2>
          <ul>
            <li class="side_list">インターノウス株式会社</li>
            <li class="side_list">XAMMPのダウンロード</li>
            <li class="side_list">Eclipsのダウンロード</li>
            <li class="side_list">Bracketsのダウンロード</li>
          </ul>
        </div>
        <div class="category">
          <h2 class="side_contents">カテゴリ</h2>
          <ul>
            <li class="side_list">HTML</li>
            <li class="side_list">PHP</li>
            <li class="side_list">MySQL</li>
            <li class="side_list">JavaScript</li>
          </ul>
        </div>
      </div>
    </main>
    <footer>
      <p>copyright © internous | 4each blog the which provides A to Z about programing.</p>
    </footer>
  </body>
</html>