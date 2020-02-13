<!DOCTYPE html>
<html lang="pt-br">
​
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/parsley.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="https://kit.fontawesome.com/5ae85dff3f.js" crossorigin="anonymous"></script>
    <title>Formulário</title>
</head>
​
<style>
    h1 {
        text-align: center;
        font-weight: lighter;
    }
​
    .form-control,
    .btn {
        border-radius: 80px;
    }
​
    .parsley-errors-list {
        color: #f00;
    }
​
    .parsley-error {
        border: 1px solid #f00;
    }
</style>
​
<body>
    <div class="container border rounded p-5 mt-5 shadow">
        <h1>Busca CEP - Equipe-Alfa-Desenvolvimento</h1>
        <form name="contato" method="post" action="ConsultaCep.php" class="form-group" data-parsley-validate>
            <div class="row">
​
                <div class="col-md-6 my-2">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" required placeholder="Informe um CEP..." data-parsley-required-message="Por favor Informe um CEP..." minlength="4" data-parsley-minlength-message="Digite ao menos 4 Carcteres!">
                </div>
                ​
            </div>
            <div class="row">
                <div class="col-md-6 my-2">
                    <button type="reset" id="cancelar" class="btn btn-danger">Cancelar   <i class="fas fa-skull-crossbones"></i></button>
                    <button type="button" id="consultar" class="btn btn-success">Consultar  <i class="far fa-paper-plane"></i></button>
                </div>
            </div>            
        </form>
    </div>  
    <div class="container border rounded p-5 mt-5 shadow">
        <h3>Resultado</h3>
        <div class="row">​            
            <div class="col-md-2 my-2">
                <label for="cepv">CEP</label>
                <input type="text" class="form-control" name="cepv" id="cepv">
            </div> 
            <div class="col-md-5 my-2">
                <label for="logradouro">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro">
            </div> 
            <div class="col-md-5 my-2">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control" name="complemento" id="complemento">
            </div> ​
        </div>
        <div class="row">​ 
            <div class="col-md-8 my-2">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="cidade">
            </div> ​           
            <div class="col-md-2 my-2">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" name="estado" id="estado">
            </div> 
            <div class="col-md-2 my-2">
                <label for="ddd">DDD</label>
                <input type="text" class="form-control" name="ddd" id="ddd">
            </div>             
        </div>
        <div class="row">​ 
            <div class="col-md-6 my-2">
                <label for="codibge">Código IBGE</label>
                <input type="text" class="form-control" name="codibge" id="codibge">
            </div> ​           
            <div class="col-md-3 my-2">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" name="latitude" id="latitude">
            </div> 
            <div class="col-md-3 my-2">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" name="longitude" id="longitude">
            </div>             
        </div>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#cep').mask('99999-999');
        });           
    </script>
    <script>
        $(document).ready(function(){ 
			$("#consultar").click(function(){                           
                var cep = $( "#cep" ).val();                
                cep = cep.replace('-','');              
                
                $.ajax({ 
                    type: "GET", 
                    url: "https://cep.awesomeapi.com.br/json/"+cep,
                    data: {'cep':cep}, 
                    success: function(result){ 
                        // result =JSON.parse(result);
                        result = JSON.parse(JSON.stringify(result))
                        $( "#cepv" ).val(result.cep);                         
                        $( "#logradouro" ).val(result.address);            
                        $( "#cidade" ).val(result.city); 
                        $( "#estado" ).val(result.state);  
                        $( "#latitude" ).val(result.lat);
                        $( "#longitude" ).val(result.lng);
                        $( "#codibge" ).val(result.city_ibge); 
                        $( "#ddd" ).val(result.ddd); 

                    }
                });
            });
        }); 
    </script>


</body>
​
</html>