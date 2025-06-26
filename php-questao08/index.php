<html>
    <body>
        <div class="container">
            <?php
            require "conexao.php";
            $sql = "select * from tbProduto"; 
            $resultado = $conn -> query($sql); 
            $temp = [];

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    $temp[] = $linha;
                }
            }

            if (!empty($temp)) {
                echo "<div class='produtos'>";
                foreach ($temp as $produto) {
                    print "<h4>Id produto: " . $produto["id"] . "</h4>";
                    print "<img src='" . $produto["img"] . "' alt='Imagem do produto' style='width:150px; height:150px;'><br><br>";
                    print $produto["nome"];
                    echo "<pre>";
var_dump($produto["img"]);
echo "</pre>";
                    


                }
                echo "</div>";
            

            } else {
                echo "Nenhum usuário encontrado.";
            }
            
            $conn->close();


            ?>

        </div>    

    </body>














</html>