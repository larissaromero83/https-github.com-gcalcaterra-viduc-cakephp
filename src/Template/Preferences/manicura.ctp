<section id="contact" class="s-contact">
   <div class="overlay"></div>
   <div class="row section-header" data-aos="fade-up">
      <h1 class="display-2 display-2--light">Hola 
         <?php
            echo h($name) . '!';
            ?>
      </h1>
      <h3 class="subhead">Esto te puede interesar</h3>
      <h1 class="display-2 display-2--light">Varias pautas a seguir</h1>
   </div>
   </div>
   <div class="row contact-contentes" data-aos="fade-up">
      <div class="contact-primary">
         <div class="col-block service-item" data-aos="fade-up" id="columna1">
            <div class="service-text">
               <iframe width="500" height="300"  align="left" src="https://www.youtube.com/embed/5in4D1tRobs" frameborder="0"
                  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               <h3 class="subhead">Aprende a realizar manicuras</h3>
               <br>Mira esto te puede ayudar a adquirir conocimientos y aprender un poco más sobre este tema
            </div>
         </div>
         <div id="columna2">
            <form action="/preferences/searchYoutubeVideos" method="GET"  >
               <div>
                  <h3 class="subhead">Temas a buscar :</h3>
                  <input type="search" style=" border-style: solid; font-size:12pt; color: #f7f9f7; letter-spacing : 3px; id="q" name="q" placeholder="Temas Buscados">
               </div>
               <div >
                  <h3 class="subhead"> Cantidad de Resultados:</h3>
                  <input type="number" style=" border-style: solid; font-size:12pt; color: #f7f9f7; letter-spacing : 3px; id="maxResults" name="maxResults" min="1" max="50" step="1" value="10">
               </div>
               <div style="text-align: right ;width:300px">
                  <input type="submit" value="Buscar">
               </div>
            </form>
         </div>
      </div>
      <div class="col-block service-item" data-aos="fade-up">
         <div class="service-text">
            <iframe width="450" height="250" src="https://www.youtube.com/embed/NYHI4YuHE4Y?start=14" frameborder="0"
               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
         <div class="service-text">
            <iframe width="450" height="250" src="https://www.youtube.com/embed/LhJvcCovL2I?start=14" frameborder="0"
               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
      </div>
      <div class="col-block service-item" data-aos="fade-up">
         <div class="service-text">
            <iframe width="450" height="250" src="https://www.youtube.com/embed/p_hgY5w0w0o?start=14" frameborder="0"
               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
         <div class="service-text">
            <iframe width="450" height="250" src="https://www.youtube.com/embed/w_IaCDjPU_M"  frameborder="0"
               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
      </div>
      <div class="col-block service-item" data-aos="fade-up">
         <div class="service-text">
            <iframe width="450" height="250" src="https://www.youtube.com/embed/vSW95-RHpvs" frameborder="0"
               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
         <div class="service-text">
            <iframe width="450" height="250" src="https://www.youtube.com/embed/Fkk_R2O9aok" frameborder="0"
               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
      </div>
      <div style="text-align: left ;width:1200px">
               <input type="button" value="Volver" onclick="javascript:history.back(-1);"/>
            </div>
   </div>
   <!-- end contact-primary -->
   </div> <!-- end contact-content -->
</section>