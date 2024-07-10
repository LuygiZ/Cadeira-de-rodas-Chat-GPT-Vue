<template>
  <div id="dashboard">
      <h1>Wheelchair Control Dashboard</h1>
    <main>
      <div id="joystick-container">
        <!-- Seu componente de joystick -->
        <Joystick ref="joystick" />
      </div>
      <div id="keyboard-controls">
        <!-- Seus controles de teclado -->
        <KeyboardControls 
          @moveJoystickVisual="moveJoystickVisual" 
          @resetJoystickVisual="resetJoystickVisual" 
        />
      </div>
    </main>
  </div>
</template>

<script>
// Importe aqui seus componentes personalizados
import Joystick from './Joystick.vue';
import KeyboardControls from './KeyboardControls.vue';
import axios from 'axios';

export default {
  name: 'Dashboard',
  components: {
    Joystick,
    KeyboardControls
  },
  methods: {
    // Métodos para comunicar com o joystick
    moveJoystickVisual(direction) {
      this.$refs.joystick.moveJoystickVisual(direction);
      this.sendDirectionToServer({ command: direction });
    },
    resetJoystickVisual() {
      this.$refs.joystick.resetJoystickVisual();
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
    }
  }
};
</script>

<style scoped>
#dashboard {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start; /* Alinhar conteúdo no topo */
  min-height: 100vh;
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
  color: #333;
}

header {
  width: 100%;
  padding: 20px;
  background-color: #333;
  color: white;
  text-align: center;
}

main {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  flex: 1; /* Ocupa o espaço restante do #dashboard */
  padding: 20px;
}

#joystick-container {
  width: 200px;
  height: 200px;
  position: relative;
  margin-bottom: 20px;
}

#keyboard-controls {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  width: 200px;
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
  color: #333; /* texto preto */
  background-color: #fff; /* fundo branco */
}

.key.active {
  background-color: #ccc; /* fundo cinza quando pressionada */
  transform: scale(1.2);
}

.key#key-up {
  top: 0;
  left: 50%;
  transform: translateX(-50%);
}

.key#key-down {
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

.key#key-left {
  left: 0;
  top: 50%;
  transform: translateY(-50%);
}

.key#key-right {
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}
</style>
