__Assume-se para este tutorial que o computador configurado possui ambiente Linux e GCC instalado.__

Codec (Na visão de usuário):
========

```
1. Codificação de arquivos   (chave ASCII numérica).
2. Decodificação de arquivos (chave ASCII numérica).
3. Compressão de arquivo     (Com base na redundância e similariadde)
4. Descompressão de arquivo  (Com base na redundância e similariadde)
```

Compilando o código fonte da Cifra (Utilizando PHP):
-----------
Pré requisitos: Servidor que leia os arquivos .php/.js

Coloque todos os arquivos na sua pasta localhost


Executando a aplicação
-----------
Colocar os arquivos no host
Abrir o navegador
Abrir o Index.php
Inserir a palavra a ser criptografada/descriptografada.
```
- ./codec
```

Codec (Na visão do desenvolvedor):
========

Visão geral do repositório:
-----------
1. interface: Funções responsáveis pela leitura e escrita dos caracteres a serem decifrados/cifrados.
2. index: Definições  das funções do arquivo .
3. Controller.index: Funções principais responsáveis pela compressão/descompressão e compactação/descompactação.

Novas funcionalidades (Futuro):
-----------
- Adivinhar a palavra sem ter que inseri-la  de forma manual na base de dados.
