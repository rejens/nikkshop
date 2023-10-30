<?php





//function that is being called from fonepay.php
function fonepay($amt)
{

   $autoSubmission = true;
   $MD = 'P';
   $AMT = $amt;
   $CRN = 'NPR';
   $DT = date('m/d/Y');
   $R1 = 'test';
   $R2 = 'test';
   $RU = 'http://localhost/nikkshop/verify.php'; //fully valid verification page link
   $PRN = uniqid();
   $PID = 'fonepay123';
   $sharedSecretKey = 'fonepay';
   $DV = hash_hmac(
      'sha512',
      $PID . ',' . $MD . ',' . $PRN . ',' . $AMT . ',' . $CRN . ',' . $DT . ',' . $R1 . ',' . $R2 . ',' . $RU,
      $sharedSecretKey
   );
   $paymentLiveUrl = 'https://clientapi.fonepay.com/api/merchantRequest';
   $paymentDevUrl = 'https://dev-clientapi.fonepay.com/api/merchantRequest';

?>

   <!DOCTYPE html>
   <html>

   <head>
      <title>Fonepay Payment page</title>
   </head>

   <body>
      <form method="GET" id="payment-form" action="<?php echo $paymentDevUrl; ?>">
         <input type="hidden" name="PID" value="<?php echo $PID; ?>">
         <input type="hidden" name="MD" value="<?php echo $MD; ?>">
         <input type="hidden" name="AMT" value="<?php echo $AMT; ?>">
         <input type="hidden" name="CRN" value="<?php echo $CRN; ?>">
         <input type="hidden" name="DT" value="<?php echo $DT; ?>">
         <input type="hidden" name="R1" value="<?php echo $R1; ?>">
         <input type="hidden" name="R2" value="<?php echo $R2; ?>">
         <input type="hidden" name="DV" value="<?php echo $DV; ?>">
         <input type="hidden" name="RU" value="<?php echo $RU; ?>">
         <input type="hidden" name="PRN" value="<?php echo $PRN; ?>">
         <input type="submit" value="Click to Pay">
      </form>
   </body>

   </html>


   <?php
   if ($autoSubmission) : ?> <script>
         window.onload = function() {
            window.setTimeout(function() {
               document.getElementById("payment-form").submit();


            }, 0);
         };
      </script>
<?php endif;
}
?>