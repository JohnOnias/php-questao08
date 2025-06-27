<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div>
            <h1 id="item1">Produtos</h1>
        </div>
        <div class="container">
            <?php
            //sa merda buga
            function addItem($inserir, $conn){

                    $stmt = $conn->prepare("INSERT INTO tbPedido (nome, quantidade, preco_unitario) VALUES (?, ?, ?)");
                        $stmt->bind_param("sid", $inserir['nome'], $inserir['quantidade'], $inserir['preco_unitario']);
                            if ($stmt->execute()) {
                 
                        echo "<script>alert('Item adcionado!');</script>";
                    } else {
                        echo "<p>Erro ao adicionar item: " . $stmt->error . "</p>";
                    }

                     $stmt->close();
            }

            require "conexao.php";
            $sql = "SELECT * FROM tbProduto"; 
            $resultado = $conn->query($sql); 
            $produtos = [];
            
            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    $produtos[] = $linha;
                }
            }      


            // se o btn for clicado
            if (isset($_POST['add']) && isset($_POST['produto_id'])) {
                            $produtoId = intval($_POST['produto_id']);
                                $busca = $conn->prepare("SELECT * FROM tbProduto WHERE id = ?");
                    $busca->bind_param("i", $produtoId);
                    $busca->execute();
                    $resultadoProduto = $busca->get_result();

                    if ($resultadoProduto->num_rows > 0) {
                            $produto = $resultadoProduto->fetch_assoc();

                                $item_add = [
                                    'nome' => $produto['nome'],
                                    'quantidade' => 1,
                                    'preco_unitario' => $produto['preco_unitario']
                                ];

                            addItem($item_add, $conn);
                    }

                    $busca->close();
                   
            }

//loop para printar os itens
if (!empty($produtos)) {
    foreach ($produtos as $produto) {
        echo "<div class='produtos'>";
        echo "<h4>Id produto: " . htmlspecialchars($produto["id"]) . "</h4>";
        echo "<img src='" . htmlspecialchars($produto["caminho_img"]) . "' alt='Imagem do produto' style='width:150px; height:150px;'><br><br>";
        echo "<p>" . htmlspecialchars($produto["nome"]) . "</p>";
        echo "<p>Estoque: " . htmlspecialchars($produto["quantidade"]) . "</p>";
        echo "<p>Preço: R$" . htmlspecialchars($produto["preco_unitario"]) . ".</p>";


        echo "<form action='index.php' method='post'>";
        echo "<input type='hidden' name='produto_id' value='" . $produto['id'] . "'>";
        echo "<button class='btn' name='add' type='submit'>Adicionar unidade ao Carrinho</button>";
        echo "</form>";
        echo "</div>";
    }

} else {
    echo "<p>Nenhum produto encontrado.</p>";
}
            $conn->close();
            
            ?>
        </div>    
        <div>
            <a href="https://localhost/php-questao08/carrinho.php">Ir para carrinho</a>
        </div>

    </body>
</html>