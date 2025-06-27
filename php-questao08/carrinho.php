<html>
    <body>

    <div>
<?php
    $total_compra = 0; 
    $itens_com_desconto = 0; 

            require "conexao.php";
            $sql = "SELECT * FROM tbPedido"; 
            $resultado = $conn->query($sql); 
            $produtos = [];
            
            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    $produtos[] = $linha;
                }
            }      
            if(!empty($produtos)){
                foreach($produtos as $produto){
                    echo "<ul>";
                    echo "<li>" . htmlspecialchars($produto["nome"]) . ". Estoque: " . htmlspecialchars($produto["quantidade"]) . ".  Preço: R$" . htmlspecialchars($produto["preco_unitario"]) ."</li>";
                    echo "</ul>";
                    
                    $subtotal = $produto['quantidade'] * $produto['preco_unitario']; 
                    if($produto['quantidade'] >1 && $produto['preco_unitario'] > 50){
                        $subtotal *= 0.90; // aplica 10% de desconto
                        $itens_com_desconto ++;
                    }
                    $total_compra += $subtotal; 
                }
                if($itens_com_desconto>=2){
                    $total_compra *= 0.95;
                    // desconto adcional de 5% se 2 ou mais itens tiverem desconto individual
                }
                echo "<div class='total'>"; 
                print("<p> Total da Compra: R$ " . number_format($total_compra, 2, ',', '.') . "</p>");
                echo "</div>"; 
            }
?>
    </div>

    </body>

</html>