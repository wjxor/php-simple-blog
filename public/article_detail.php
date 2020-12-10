<?php
$pageTitle = '<i class="far fa-newspaper"></i> <span>DETAIL</span>';
?>
<?php include_once 'header.php'; ?>
<?php
$_REQUEST['id'] = mysqli_real_escape_string($dbLink, $_REQUEST['id']);

$sql = "
SELECT *
FROM article
WHERE id = '{$_REQUEST['id']}'
";
$rs = mysqli_query($dbLink, $sql);
$article = mysqli_fetch_assoc($rs);
?>

<section class="section section-article-detail con-min-width">
  <div class="con">
    <div>
      번호 : <?=$article['id']?>
    </div>
    <hr />
    <div>
      날짜 : <?=$article['regDate']?>
    </div>
    <hr />
    <div>
      제목 : <?=$article['title']?>
    </div>
    <hr />
    <div>
      <?=nl2br($article['body'])?>
    </div>
    <hr>
    <div>
      <a href="#" class="underline" onclick="history.back();">뒤로가기</a>
      <a href="javascript:;" onclick="if ( confirm('삭제하시겠습니까?') ) { location.replace('/do_delete_article.php?id=<?=$article['id']?>'); };" class="underline">삭제</a>
      <a href="/modify_article.php?id=<?=$article['id']?>" class="underline">수정</a>
    </div>
  </div>
</section>

<?php include_once 'footer.php'; ?>