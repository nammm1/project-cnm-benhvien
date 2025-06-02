<!-- chatbot_partial.php -->
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    #chatbot-toggle {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        font-size: 28px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 999;
    }

    #chatbot-box {
        position: fixed;
        bottom: 100px;
        right: 20px;
        width: 350px;
        height: 500px;
        border: 1px solid #ccc;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        display: none;
        z-index: 998;
    }

    #chatbot-box iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
</style>

<!-- Nút mở chatbot -->
<button id="chatbot-toggle">💬</button>

<!-- Khung chatbot -->
<div id="chatbot-box">
    <iframe src="https://chatbothospital.streamlit.app/?embed=true&embed_options=light_theme"
            allow="camera; microphone; clipboard-read; clipboard-write">
    </iframe>
</div>

<script>
    const toggleBtn = document.getElementById('chatbot-toggle');
    const chatbotBox = document.getElementById('chatbot-box');

    toggleBtn.addEventListener('click', () => {
        if (chatbotBox.style.display === 'none' || chatbotBox.style.display === '') {
            chatbotBox.style.display = 'block';
        } else {
            chatbotBox.style.display = 'none';
        }
    });
</script>