<template>
    <div id="keyboard-controls">
      <div class="key" id="key-up">↑</div>
      <div class="key" id="key-left">←</div>
      <div class="key" id="key-down">↓</div>
      <div class="key" id="key-right">→</div>
    </div>
  </template>
  
  <script>
  import axios from 'axios'; // Importar o Axios aqui
  
  export default {
    name: 'KeyboardControls',
    mounted() {
      this.addKeyboardControls();
    },
    beforeDestroy() {
      this.removeKeyboardControls();
    },
    methods: {
      addKeyboardControls() {
        window.addEventListener('keydown', this.handleKeyDown);
        window.addEventListener('keyup', this.handleKeyUp);
      },
      removeKeyboardControls() {
        window.removeEventListener('keydown', this.handleKeyDown);
        window.removeEventListener('keyup', this.handleKeyUp);
      },
      handleKeyDown(event) {
        let command = null;
        switch (event.key) {
          case 'ArrowUp':
            command = 'up';
            this.addActiveClass('key-up');
            this.$emit('moveJoystickVisual', 'up');
            break;
          case 'ArrowDown':
            command = 'down';
            this.addActiveClass('key-down');
            this.$emit('moveJoystickVisual', 'down');
            break;
          case 'ArrowLeft':
            command = 'left';
            this.addActiveClass('key-left');
            this.$emit('moveJoystickVisual', 'left');
            break;
          case 'ArrowRight':
            command = 'right';
            this.addActiveClass('key-right');
            this.$emit('moveJoystickVisual', 'right');
            break;
        }
        if (command) {
          this.sendDirectionToServer({ command: command });
        }
      },
      handleKeyUp(event) {
        switch (event.key) {
          case 'ArrowUp':
            this.removeActiveClass('key-up');
            this.$emit('resetJoystickVisual');
            break;
          case 'ArrowDown':
            this.removeActiveClass('key-down');
            this.$emit('resetJoystickVisual');
            break;
          case 'ArrowLeft':
            this.removeActiveClass('key-left');
            this.$emit('resetJoystickVisual');
            break;
          case 'ArrowRight':
            this.removeActiveClass('key-right');
            this.$emit('resetJoystickVisual');
            break;
        }
        this.sendDirectionToServer({ command: 'stop' });
      },
      sendDirectionToServer(data) {
        axios.post('http://localhost:3000/direcao', data)
          .then(response => {
            console.log('Dados enviados com sucesso:', response.data);
          })
          .catch(error => {
            console.error('Erro ao enviar dados:', error);
          });
      },
      addActiveClass(keyId) {
        const key = document.getElementById(keyId);
        if (key) {
          key.classList.add('active');
        }
      },
      removeActiveClass(keyId) {
        const key = document.getElementById(keyId);
        if (key) {
          key.classList.remove('active');
        }
      }
    }
  };
  </script>
  
  
  <style scoped>
  #keyboard-controls {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    position: relative;
    width: 200px;
    height: 200px;
  }
  
  .key {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #333; /* borda preta */
    border-radius: 10px;
    font-size: 24px;
    transition: transform 0.1s, background-color 0.1s;
    position: absolute;
    color: #333; /* texto preto */
    background-color: #fff; /* fundo branco */
  }
  
  #key-up {
    top: 0;
    left: 50%;
    transform: translateX(-50%);
  }
  
  #key-down {
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
  }
  
  #key-left {
    left: 0;
    top: 50%;
    transform: translateY(-50%);
  }
  
  #key-right {
    right: 0;
    top: 50%;
    transform: translateY(-50%);
  }
  
  .key.active {
    background-color: #ccc; /* fundo cinza quando pressionada */
    transform: scale(1.2);
  }
  </style>
  