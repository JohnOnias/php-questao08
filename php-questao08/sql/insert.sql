use loja; 
insert into tbProduto (nome, quantidade, preco_unitario, img)
values ("Camisa", 2, 49.90, LOAD_FILE('C:\xampp\htdocs\questao08\php-questao08\img\camisa.png')),
		("Calça Jeans", 1, 129.90, LOAD_FILE('C:\xampp\htdocs\questao08\php-questao08\img\calca.png')),
        ("Meias", 5, 9.99, LOAD_FILE('C:\xampp\htdocs\questao08\php-questao08\img\meia.png')),
        ("Tenis", 1, 299.90, LOAD_FILE('C:\xampp\htdocs\questao08\php-questao08\img\tenis.png'));
        
        
        
        
        
        
        
        
        
SHOW VARIABLES LIKE 'secure_file_priv';
