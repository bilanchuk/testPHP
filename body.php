<?php
  require 'functions.php';
 ?>
<body>
  <div class="container-fluid all">
    <div class="row">
      <div class="col">
        <form enctype="multipart/form-data" class="form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
        <div class="form-group">
          <label>Електронна адреса</label>
          <input name="mail" type="email" class="form-control" placeholder="Введiть свю електронну адресу">
          <small class="form-text text-muted" >Ми ніколи не передамо вашу електронну адресу</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Імя</label>
          <input type="text" class="form-control" placeholder="Введіть імя" name="name">
        </div>
        <div class="form-group">
          <label>Введіть ваше повідомлення</label>
          <textarea class="form-control" rows="3" name="text"></textarea>
        </div>
        <div class="form-group form-check">
          <div class="starswrap">
            <div id="starsrewiev">
              <input id="star-5" type="radio" name="stars" value="5"/>
              <label title="Відмінно" for="star-5">
               <i class="fas fa-star"></i>
              </label>
             <input id="star-4" type="radio" name="stars" value="4"/>
             <label title="Добре" for="star-4">
               <i class="fas fa-star"></i>
             </label>
             <input id="star-3" type="radio" name="stars"  value="3" />
             <label title="Нормально" for="star-3">
               <i class="fas fa-star"></i>
             </label>
             <input id="star-2" type="radio" name="stars" value="2"/>
             <label title="Погано" for="star-1">
               <i class="fas fa-star"></i>
             </label>
             <input id="star-1" type="radio" name="stars" value="1" checked="checked"/>
             <label title="Ужасно" for="star-1">
               <i class="fas fa-star"></i>
             </label>
            </div>
         </div>
        </div>
        <small class="form-text text-muted">Якщо ви бажаєте завантажити зображення, оберіть його нижче</small>
        <input type="file" name="img" accept="image/*"><br><br>
        <button type="submit" class="btn btn-primary">Залишити відгук</button>
      </form>
      </div>
      <div class="col">
        <div class="container-fluid">
        <?php
            $uploaddir = 'images/';
            if(!empty($_FILES['img'])){
              $uploadfile = $uploaddir .basename($_FILES['img']['name']);
              move_uploaded_file($_FILES['img']['tmp_name'],$uploadfile);
            }
            if(!empty($_POST['mail']) and !empty($_POST['name']) and !empty($_POST['text']) and
            !empty($_POST['stars'])){
              addRow($_POST['mail'],$_POST['name'],$_POST['text'],$_POST['stars'],$uploadfile);
            }
            $avgR=getAvgRate();
            print "<h3 align='center'>Всі відгуки</h3>";
            print "<h4 align='center'>Середній рейтинг відгуків ".round($avgR,2)."</h4>";

            //Пагінатор
            $paginator=array();
            $paginator['perPage']=3;
            $paginator['currentPage']=isset($_GET['page']) ? $_GET['page'] : 1;
            $paginator['offset']=($paginator['currentPage']*$paginator['perPage']) - $paginator['perPage'];
            $paginator['link']='/test/?page=';
            list($all,$cnt)=getAllFromDB($paginator['offset'],$paginator['perPage']);

            $paginator['pageCnt'] = ceil($cnt[0]/$paginator['perPage']);

            print "<div class='pagination'>";
            if($paginator['currentPage'] !=1){
              $paginator['currentPage']-=1;
              print "<span><a href='{$paginator['link']}{$paginator['currentPage']}'>&laquo;</a></span>";
              $paginator['currentPage']+=1;
            }


            print "<strong><span>{$paginator['currentPage']}</span></strong>";

            if($paginator['currentPage']<$paginator['pageCnt']){
              $paginator['currentPage']+=1;
              print "<span><a href='{$paginator['link']}{$paginator['currentPage']}'>&raquo;</a></span>";
              $paginator['currentPage']-=1;
            }

            print "</div>";

            list($all,$cnt)=getAllFromDB($paginator['offset'],$paginator['perPage']);
            for($i=0;$i<count($all);$i++){
              print "<div class='newRev'>";
              for($j=1;$j<=5;$j++){
                switch ($j) {
                  case 1:
                    print "<span style='color:blue'>{$all[$i][2]}</span>";
                    break;
                  case 2:
                    print "(<span style='color:red'>{$all[$i][1]}</span>)";
                    break;
                  case 3:
                    for($m=1;$m<=$all[$i][4];$m++){
                      print "<i class='fas fa-star'></i>";
                    }
                    break;
                  case 4:
                    print "<br><div class='container-fluid'>{$all[$i][3]}</div>";
                    break;
                  case 5:
                    if(!strcasecmp($all[$i][$j],"images/")==0){
                      print "<br><img src='{$all[$i][$j]}' width='100' height='100' />";
                    }
                    break;
                }
              }
              print "</div>";
            }
            print "<br />";
         ?>
         </div>
      </div>
    </div>
  </div>
</body>
