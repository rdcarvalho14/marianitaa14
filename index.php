<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marianita - Amor em Fotos</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fff5e6 0%, #ffe6e6 50%, #fff5e6 100%);
            margin: 0;
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1800px;
            margin: 0 auto;
            padding: 40px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: stretch;
            gap: 40px;
        }
        .content-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            width: 100%;
            max-width: 1800px;
            margin: 0 auto;
        }
        .header {
            width: 100%;
            text-align: center;
            padding: 40px 0 30px 0;
            position: relative;
        }
        .header h1 {
            font-family: 'Great Vibes', cursive;
            color: #d4145a;
            font-size: 4rem;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: fadeInDown 1.5s ease-out;
        }
        .header p {
            color: #ff6b6b;
            font-size: 1.2rem;
            margin-top: 10px;
            font-weight: 300;
            letter-spacing: 2px;
        }
        .slider {
            width: 1000px;
            margin: 0;
            position: relative;
            flex-grow: 1;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
            animation: fadeIn 1s ease-out;
        }
        .slides {
            display: flex;
            overflow: hidden;
            border-radius: 15px;
            position: relative;
            min-height: 700px;
            background: #fff;
            align-items: center;
            justify-content: center;
        }
        .slides::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.1);
            border-radius: 15px;
            z-index: 2;
            pointer-events: none;
        }
        .slides img {
            width: 100%;
            height: 700px;
            object-fit: cover;
            display: none;
            border-radius: 15px;
            transition: all 0.7s ease-in-out;
        }
        .slides img.active {
            display: block;
            animation: zoomIn 0.7s ease-out;
        }
        .controls {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 3;
        }
        .controls button {
            background: rgba(255, 255, 255, 0.9);
            color: #d4145a;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }
        .controls button:hover {
            background: #d4145a;
            color: white;
            transform: scale(1.1);
        }
        .dots {
            text-align: center;
            margin: 20px 0 10px 0;
            position: relative;
            z-index: 3;
        }
        .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 0 6px;
            background: #ffccd5;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid #ff8fa3;
            transition: all 0.3s ease;
            transform: scale(0.8);
        }
        .dot.active {
            background: #d4145a;
            border-color: #fff;
            transform: scale(1);
        }
        .dot:hover {
            transform: scale(1.2);
        }
        .footer {
            text-align: center;
            color: #d4145a;
            margin: 50px 0 20px 0;
            font-family: 'Great Vibes', cursive;
            font-size: 2.5rem;
            position: relative;
            padding: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .footer::before, .footer::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 2px;
            background: linear-gradient(to right, transparent, #ff8fa3, transparent);
            left: 50%;
            transform: translateX(-50%);
        }
        .footer::before {
            top: 0;
        }
        .footer::after {
            bottom: 0;
        }
        .heart {
            color: #d4145a;
            font-size: 1.4em;
            display: inline-block;
            animation: heartbeat 1.5s ease-in-out infinite;
        }
        .poem-column {
            width: 350px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(212, 20, 90, 0.1);
            margin: 0;
            text-align: center;
            animation: fadeIn 1.2s ease-out;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 780px; /* altura da foto (700px) + padding do slider (40px*2) */
            flex-shrink: 0;
        }
        .poem-column h3 {
            font-family: 'Great Vibes', cursive;
            color: #d4145a;
            font-size: 2.2rem;
            margin-bottom: 25px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .poem-column p {
            font-family: 'Poppins', sans-serif;
            color: #666;
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 25px;
            font-style: italic;
        }
        .poem-divider {
            width: 80%;
            height: 1px;
            background: linear-gradient(to right, transparent, #ff8fa3, transparent);
            margin: 15px auto;
        }
        .question-section {
            width: 100%;
            text-align: center;
            margin: 60px auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            animation: fadeIn 1.2s ease-out;
        }
        .question-text {
            font-family: 'Great Vibes', cursive;
            color: #d4145a;
            font-size: 2.8rem;
            margin-bottom: 40px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            line-height: 1.4;
        }
        .options-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .option-button {
            background: linear-gradient(135deg, #ffe6e6, #fff5f5);
            border: 2px solid #ff8fa3;
            padding: 20px;
            border-radius: 15px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            color: #d4145a;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 20, 90, 0.1);
        }
        .option-button:hover {
            transform: translateY(-5px);
            background: linear-gradient(135deg, #ffd6d6, #ffe6e6);
            box-shadow: 0 6px 20px rgba(212, 20, 90, 0.2);
        }
        .option-button.selected {
            background: linear-gradient(135deg, #ff8fa3, #ff6b6b);
            color: white;
            border-color: #d4145a;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(1.1); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes heartbeat {
            0% { transform: scale(1); }
            14% { transform: scale(1.3); }
            28% { transform: scale(1); }
            42% { transform: scale(1.3); }
            70% { transform: scale(1); }
        }
        @media (max-width: 1800px) {
            .content-wrapper {
                flex-direction: column;
                align-items: center;
            }
            .slider {
                width: 90%;
                margin: 40px auto;
            }
            .poem-column {
                width: 90%;
                max-width: 600px;
                margin: 20px auto;
                min-height: auto;
                padding: 40px;
            }
        }
        @media (max-width: 768px) {
            .header h1 { font-size: 3rem; }
            .slides { min-height: 350px; }
            .slides img { height: 350px; }
            .slider { padding: 15px; margin: 15px; }
            .poem-column {
                width: 100%;
                margin: 15px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Save the date <span class="heart">&#10084;&#65039;</span></h1>
            <p>Sim, mais um dia 14</p>
        </div>
        <div class="content-wrapper">
            <div class="poem-column">
                <h3>In Love - David Carreira</h3>
<p>Tu querias fugir da palavra relação,<br>
Neste lance ficava de fora o coração,<br>
Amigos sem compromisso, e cada um sabia disso,<br>
Não queria aguardar na memória sensação.</p>

<div class="poem-divider"></div>

<p>As formas de teu corpo gravadas na minha mão,<br>
Era sem falar in love, in love, in love, in love,<br>
Sem falar in love, in love, in love, in love,<br>
Mas do nada, um sorriso, uma lágrima,<br>
Tudo me lembra de ti.</p>

<div class="poem-divider"></div>

<p>O que eu faço ao retrato no meu quarto,<br>
Porque eu estou in love, in love, in love, in love,<br>
Love, in love, in love, in love, in love,<br>
Love, in love, in love, in love, in love,<br>
Love, in love, in love, in love, in love.</p>


            </div>
            <div class="slider">
            <div class="slides">
                <img src="fotos/IMG-20250913-WA0067.jpg" class="active" alt=" ">
<img src="fotos/IMG-20250913-WA0068.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0056.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0057.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0058.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0059.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0060.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0061.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0062.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0063.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0064.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0065.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0066.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0047.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0048.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0049.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0050.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0051.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0052.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0053.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0054.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0055.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0045.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0046.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0041.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0042.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0043.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0044.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0038.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0039.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0040.jpg" alt=" ">
<img src="fotos/IMG-20250913-WA0037.jpg" alt=" ">
<img src="fotos/IMG-20250805-WA0049.jpg" alt=" ">
<img src="fotos/IMG-20250626-WA0011.jpg" alt=" ">
<img src="fotos/IMG-20250626-WA0003.jpg" alt=" ">
<img src="fotos/IMG-20250413-WA0006.jpg" alt=" ">

            </div>
            <div class="controls">
                <button onclick="prevSlide()">&#10094;</button>
                <button onclick="nextSlide()">&#10095;</button>
            </div>
            <div class="dots" id="dots"></div>
        </div>
            <div class="poem-column">
                <h3>Amor de Ganga - Miguel Luz</h3>
            <p>O teu amor à queima-roupa<br>
Atou-me um nó na garganta<br>
Eu quero que ele dure a vida toda<br>
Como estas calças de ganga</p>
<div class="poem-divider"></div>
<p>Tá tudo tão verde, e eu não conheço o amanhã<br>
Então só pra ter a certeza, visto o nosso amor de ganga</p>
<div class="poem-divider"></div>
<p>É um amor de ganga, o nosso amor é de ganga<br>
Com estas calças de ganga, o nosso amor é de ganga</p>
<div class="poem-divider"></div>
<p>Se fores embora, tranca a porta<br>
Nunca mais entra aqui ninguém<br>
Bato três vezes na madeira<br>
E visto o nosso amor de ganga</p>
            </div>
        </div>
        <div class="question-section">
            <div class="question-text">
                Baby boo, estás disponível para um belíssimo date amanhã, que prometo não arrepender?
            </div>
            <div class="options-container">
                <button class="option-button" onclick="selectOption(this, 'sim')">SIM MEU AMOR</button>
                <button class="option-button" onclick="selectOption(this, 'malandrices')">não, contigo só quero fazer malandrices, 24/7</button>
                <button class="option-button" onclick="selectOption(this, 'nao')">não, não gosto de ti</button>
                <button class="option-button" onclick="selectOption(this, 'talvez')">não sei se consigo (o rodrigo ama-te muito na mesma)</button>
            </div>
        </div>
        <div class="footer">
            <div class="heart">&#10084;&#65039;</div>
            "Somos casa, bagunça e viagem para o resto da vida"
        </div>
    </div>
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slides img');
        const dotsContainer = document.getElementById('dots');
        function showSlide(index) {
            slides.forEach((img, i) => {
                img.classList.remove('active');
                if (i === index) img.classList.add('active');
            });
            document.querySelectorAll('.dot').forEach((dot, i) => {
                dot.classList.remove('active');
                if (i === index) dot.classList.add('active');
            });
        }
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }
        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }
        function goToSlide(index) {
            currentSlide = index;
            showSlide(currentSlide);
        }
        // Cria as bolinhas do carrossel
        slides.forEach((_, i) => {
            const dot = document.createElement('span');
            dot.classList.add('dot');
            if (i === 0) dot.classList.add('active');
            dot.onclick = () => goToSlide(i);
            dotsContainer.appendChild(dot);
        });
        setInterval(nextSlide, 3500); // Troca automática a cada 3,5 segundos

        function selectOption(button, option) {
            // Remove a classe selected de todos os botões
            document.querySelectorAll('.option-button').forEach(btn => {
                btn.classList.remove('selected');
            });
            
            // Adiciona a classe selected ao botão clicado
            button.classList.add('selected');
            
            // Mensagem personalizada baseada na opção
            let message = '';
            switch(option) {
                case 'sim':
                    message = 'AMOTE AMOTE, verifica o email';
                    // Envia o email
                    fetch('send_email.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'option=sim'
                    });
                    break;
                case 'malandrices':
                    message = 'Proposta interessante... 😘';
                    break;
                case 'nao':
                    message = 'Resposta errada... tenta de novo!';
                    break;
                case 'talvez':
                    message = 'Tranquilissimo, amote sempre!';
                    break;
            }
            
            // Cria ou atualiza a mensagem
            let responseMsg = document.querySelector('.response-message');
            if (!responseMsg) {
                responseMsg = document.createElement('div');
                responseMsg.className = 'response-message';
                responseMsg.style.cssText = `
                    margin-top: 30px;
                    font-family: 'Great Vibes', cursive;
                    color: #d4145a;
                    font-size: 2rem;
                    text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
                    animation: fadeIn 0.5s ease-out;
                `;
                button.closest('.options-container').insertAdjacentElement('afterend', responseMsg);
            }
            responseMsg.textContent = message;
        }
    </script>
</body>
</html>
