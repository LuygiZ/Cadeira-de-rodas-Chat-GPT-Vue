<template>
    <div id="joystick-container"></div>
  </template>
  
  <script>
  import nipplejs from 'nipplejs';
  import axios from 'axios';
  
  export default {
    name: 'Joystick',
    mounted() {
      this.initializeJoystick();
    },
    data() {
      return {
        joystick: null,
        joystickContainer: null,
      };
    },
    methods: {
      initializeJoystick() {
        this.joystickContainer = document.getElementById('joystick-container');
        const options = {
          zone: this.joystickContainer,
          mode: 'static',
          position: { left: '50%', top: '50%' },
          color: 'black',
        };
  
        this.joystick = nipplejs.create(options);
  
        this.joystick.on('move', (evt, data) => {
          const direction = data.direction;
          if (direction) {
            let command = null;
            switch (direction.angle) {
              case 'up':
                command = 'up';
                this.moveJoystickVisual('up');
                break;
              case 'down':
                command = 'down';
                this.moveJoystickVisual('down');
                break;
              case 'left':
                command = 'left';
                this.moveJoystickVisual('left');
                break;
              case 'right':
                command = 'right';
                this.moveJoystickVisual('right');
                break;
            }
            if (command) {
              this.sendDirectionToServer({ command: command });
            }
          }
        });
  
        this.joystick.on('end', () => {
          this.sendDirectionToServer({ command: 'stop' });
          this.resetJoystickVisual();
        });
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
      moveJoystickVisual(direction) {
        const joystickFront = this.joystickContainer.querySelector('.front').style;
        switch (direction) {
          case 'up':
            joystickFront.transform = 'translateY(-20px)';
            break;
          case 'down':
            joystickFront.transform = 'translateY(20px)';
            break;
          case 'left':
            joystickFront.transform = 'translateX(-20px)';
            break;
          case 'right':
            joystickFront.transform = 'translateX(20px)';
            break;
        }
      },
      resetJoystickVisual() {
        const joystickFront = this.joystickContainer.querySelector('.front').style;
        joystickFront.transform = 'translate(0, 0)';
      }
    }
  };
  </script>
  
  <style scoped>
  #joystick-container {
    width: 200px;
    height: 200px;
    position: relative;
  }
  </style>
  