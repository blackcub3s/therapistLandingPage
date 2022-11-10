<!--programat tot per mi :)-->
<div class="card">
  <div class="card-header text-center">
    <strong>Pagament amb targeta</strong>
  </div>
  <div class="card-body">
   
    
        <!-- Aqui cva el form-->

        <form name = "formulari_tarja" method = "post" action = "paga_amb_tarja_i_envia_sms.php">

            <div class="container">

                <div class="row">

                    <!-- Aqui poso el nom del titular de la tarja -->      
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input class="form-control" type="text" id="nom_tarja" name="nom_titular_targeta" required>
                            </div>   
                    </div>  
                <!-- Aqui poso el numero de targeta -->   
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="nom">Número</label>
                                <input class="form-control" type="text" id="numero_tarja" name = "numero_targeta"required>
                            </div>   
                    </div>            



                </div>



                <div class="row">


                    <!-- Aqui poso el mes del formulari (ocupa nomes 2 columnes)-->      
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="mes">mes</label>
                            <select class="form-control" id="caducitat_mes" name="mes_tarja" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>                 
                                <option>11</option>
                                <option>12</option>                 
                            </select>
                        </div>   
                    </div>

                 <!-- Aqui poso el any de ola targeta -->      
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="any">any</label>
                            <select class="form-control" id="caducitat_any" name="any_tarja"required>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                                <option>2026</option>
                                <option>2027</option>
                                <option>2028</option>
                                <option>2029</option>
                                <option>2030</option>                 
                                <option>2031</option>
                                <option>2032</option>                 
                            </select>
                        </div>   
                    </div>

                    <div class="col-md-5"></div>    


                    <!-- Aqui poso el csv de ola targeta -->      
                    <div class="col-md-3">
                            <div class="form-group">
                                <label for="csv">CSV</label>
                                <input class="form-control" type="number" name = "codi_csv" id="csv" required>
                            </div>   
                    </div>
                </div>

            </div>         







            <button type="submit" class="btn btn-primary">Paga</button>
        </form>


        









 
  </div>
</div>




