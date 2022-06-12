<?php include('../izdvojeno-front/menu.php');  ?>



    <section class="kontakt" style="background-color: #f5f6fa">
    <h2 class="text-center text-velicina text-position">Možete nas kontaktirati na sledeće načine:</h2>
    <table id="table2" class="tbl-cela">
   <tr>
       <th><img src="../slike/ikonice/icons8-phone-24.png" style="width: 30px; height: 30px"></th>
       <td>0800-8525-5564</td>
   </tr>
   <tr>
        <th><img src="../slike/ikonice/icons8-mail-100.png" style="width: 30px; height: 30px"></th>
        <td>gwarehouse54@gmail.com</td>
</tr>     
<tr>
        <th><img src="../slike/ikonice/icons8-viber-48.png" style="width: 30px; height: 30px"></th>
        <td>060/1564-51651</td>
</tr>    
<tr>
        <th><img src="../slike/ikonice/icons8-whatsapp-48.png" style="width: 35px; height: 35px"></th>
        <td>060/12315616</td>
</tr>    
</table>
</section>
    <section>
        <div class="wrapper">
            <h2>KONTAKT FORMA</h2>
            <div id="error_message"></div>
            <form id="myform" onsubmit="return validate();">
              <div class="input_field">
                  <input type="text" placeholder="Ime*" id="name">
              </div>
              <div class="input_field">
                  <input type="text" placeholder="Naslov*" id="subject">
              </div>
              <div class="input_field">
                  <input type="text" placeholder="Telefon*" id="phone">
              </div>
              <div class="input_field">
                  <input type="text" placeholder="Email*" id="email">
              </div>
              <div class="input_field">
                  <textarea placeholder="Poruka*" id="message"></textarea>
              </div>
              <div class="btn">
                  <input type="submit" value="Pošalji">
              </div>
            </form>
          </div>
    </section>


    <?php include('../izdvojeno-front/footer.php'); ?>


