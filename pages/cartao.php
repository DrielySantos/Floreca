<?php
    require_once './head.php';
    require_once './menu.php';
?>

    <div class="container-fluid pag-principal">
        <div class="row">
            <div class="col-md-12 text-center">
                <h5>Aguma coisa aqui</h5>
                <h3>Nossos Tratamentos</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row carousel">
            <div class="cards-list">
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="./imagens/dog.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Botox</h5>
                            <p class="card-text">A solução contra: rugas, pés de galinha e código de barras.</p>
                            <a href="http://">Clique e confira</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="./imagens/dog.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Botox</h5>
                            <p class="card-text">A solução contra: rugas, pés de galinha e código de barras.</p>
                            <a href="http://">Clique e confira</a>
                        </div>
                    </div>
                </div> 

                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="./imagens/dog.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Botox</h5>
                            <p class="card-text">A solução contra: rugas, pés de galinha e código de barras.</p>
                            <a href="http://">Clique e confira</a>
                        </div>
                    </div>
                </div> 

                
            </div>
        </div>

   
    <style>

.cards-list {
  z-index: 0;
  width: 100%;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

        .card{
            margin: 20px auto;
            width: 300px;
            height: 350px;
            border-radius: 40px ;
            box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
            cursor: pointer;
            position: relative;
            z-index: 1;
            transition: 0.4s;
        }

        .card:hover {
            transform: scale(0.9, 0.9);
            box-shadow: 5px 5px 30px 15px rgba(0,0,0,0.25), -5px -5px 30px 15px rgba(0,0,0,0.22);
}

       .card-body a{
        text-decoration: none;
        color: #fff;
        background-color: rgb(30, 81, 75);
        margin-left: 60px;
        margin-bottom: 20px;
        padding: 6px 12px;
        display: inline-block;
        font-size: 14px;
        border: 1px solid #2c3e50;
        border-radius: 50px;
        transition: 0.6s all;
       }
        .card-img-top{
            border-radius: 40px 40px 0 0;
        }
    </style>




<?php
    require_once './footer.php';
?>