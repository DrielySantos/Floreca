<?php
    require_once './head.php';
    require_once './menu.php';

?>

<div class="slider">
        <div class="slides"> 
            <!-- Radio Buttons -->
            <input type="radio" nome="radio-btn" id="radio1">
            <input type="radio" nome="radio-btn" id="radio2">
            <input type="radio" nome="radio-btn" id="radio3">
            <input type="radio" nome="radio-btn" id="radio4"> 
            <!-- Fim Radio Buttons -->

            <!-- Slide imagens -->
            <div class="slide first">
                <img src="/novo/imagens/carrossel-1.jpg" alt="imagem carrossel 1">
            </div>
            <div class="slide">
                <img src="/novo/imagens/carrossel-2.jpg" alt="imagem carrossel 2">
            </div>
            <div class="slide">
                <img src="/novo/imagens/carrossel-3.jpg" alt="imagem carrossel 3">
            </div>
            <div class="slide">
                <img src="/novo/imagens/carrossel-4.jpg" alt="imagem carrossel 4">
            </div>
             <!-- Slide imagens -->

             <!-- Navigation auto -->
             <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
             </div>
             
        </div>

        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>

    </div> 

    <!-- CONTEÚDO -->

      <div class="container-fluid texto">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2>Conhece o Floreça?</h2>
            <h6>algum subtitulo aqui!!</h6>
          </div>
        </div>
      </div>

<!-- *************** SEGUNDO CONTEÚDO ***************** -->

      <div class="container">
        <div class="row carousel">
            <div class="col-md-3">
                <div class="details">
                    <img src="./imagens/dog.webp" alt="imagem de um cachorrinho">
                    <h2>Heading</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe dolorem repellat libero molestiae ab laudantium cupiditate voluptates dicta consequuntur. Perferendis quis omnis libero nemo mollitia. Recusandae quia cumque quisquam cupiditate!</p>
                    <a href="https://">Fale Conosco</a>
                    <a href="http://">Saiba +</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="details">
                    <img src="./imagens/dog.webp" alt="imagem de um cachorrinho">
                    <h2>Heading</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe dolorem repellat libero molestiae ab laudantium cupiditate voluptates dicta consequuntur. Perferendis quis omnis libero nemo mollitia. Recusandae quia cumque quisquam cupiditate!</p>
                    <a href="https://">Fale Conosco</a>
                    <a href="http://">Saiba +</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="details">
                    <img src="./imagens/dog.webp" alt="imagem de um cachorrinho">
                    <h2>Heading</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe dolorem repellat libero molestiae ab laudantium cupiditate voluptates dicta consequuntur. Perferendis quis omnis libero nemo mollitia. Recusandae quia cumque quisquam cupiditate!</p>
                    <a href="https://">Fale Conosco</a>
                    <a href="http://">Saiba +</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="details">
                    <img src="./imagens/dog.webp" alt="imagem de um cachorrinho">
                    <h2>Heading</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe dolorem repellat libero molestiae ab laudantium cupiditate voluptates dicta consequuntur. Perferendis quis omnis libero nemo mollitia. Recusandae quia cumque quisquam cupiditate!</p>
                    <a href="https://">Fale Conosco</a>
                    <a href="http://">Saiba +</a>
                </div>
            </div>

        </div>
      </div>