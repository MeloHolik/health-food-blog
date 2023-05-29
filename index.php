<?php
require_once 'connect.php';
$recept = mysqli_query($connect, "SELECT * FROM `list`");
$recept = mysqli_fetch_all($recept);
require 'components/db.php';
$imgs = get_img();
$currentImgIndex = 1;
$ingrs = get_ingr();
$currentIngrIndex = 1;
?>

<? require_once 'components/header.php'; ?>
<?php
foreach ($recept as $num) {
  $currentImg = $imgs[$currentImgIndex]['img_url'];
    $currentImgIndex++;
  $currentIngr = $ingrs[$currentIngrIndex]['img_url'];
    $currentIngrIndex++;
?>
  <div style="border: 1px solid #ccc; padding: 16px; margin-bottom: 16px; font-family: Arial, sans-serif; color: #333;">
    <h1 style="font-size: 36px; font-weight: bold; margin-top: 0; margin-bottom: 16px;"><?= $num[1] ?></h1>
    <div style="display: flex; justify-content: space-between;">
      <div>
        <h2 style="font-size: 24px; font-weight: bold; margin-top: 0; margin-bottom: 16px;">КБЖУ на 100 г.</h2>
        <p style="font-size: 16px; line-height: 1.5; margin-bottom: 8px;">Белки:<?= $num[4] ?></p>
        <p style="font-size: 16px; line-height: 1.5; margin-bottom: 8px;">Жиры: <?= $num[5] ?></p>
        <p style="font-size: 16px; line-height: 1.5; margin-bottom: 8px;">Углеводы: <?= $num[6] ?></p>
        <p style="font-size: 16px; line-height: 1.5; margin-bottom: 0;">Калории: <?= $num[7] ?></p>
      </div>
      <div>
      <img src="<?= $currentImg ?>" width="156" height="120">
      </div>
    </div>
    <h2 style="font-size: 24px; font-weight: bold; margin-top: 32px; margin-bottom: 16px;">Ингредиенты:</h2>
    <p style="font-size: 16px; line-height: 1.5; margin-bottom: 16px;"><?= $num[8] ?></p>
    <img src="<?= $currentIngr ?>" width="156" height="120">
    <h2 style="font-size: 24px; font-weight: bold; margin-top: 32px; margin-bottom: 16px;">Рецепт</h2>
    <p style="font-size: 16px; line-height: 1.5; margin-bottom: 16px;"><?= $num[3] ?></p>
    <p style="text-align: right; margin-bottom: 0;">
      <a href="update.php?id=<?= $num[0] ?>" style="display: inline-block; text-decoration: none; background-color: #c3272c; color: #fff; padding: 8px 16px; border-radius: 4px; transition: all 0.3s ease;">Редактировать рецепт</a>
    </p>
  </div>
<?php
}
?>
<? 
require_once 'components/form.php';
require_once 'components/footer.php'; 
?>