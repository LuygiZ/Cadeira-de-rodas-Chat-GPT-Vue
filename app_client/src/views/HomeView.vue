<template>
  <div class="home-view">
    <header>
      <h1>Smart Wheelchairs</h1>
      <p>Discover the latest in smart wheelchair technology.</p>
    </header>
    
    <section class="features">
      <h2>Features</h2>
      <div class="feature-list">
        <div class="feature-item">
          <i class="bi bi-speedometer2"></i>
          <h3>Advanced Navigation</h3>
          <p>Navigate with ease using advanced sensors and AI technology.</p>
        </div>
        <div class="feature-item">
          <i class="bi bi-battery-charging"></i>
          <h3>Long Battery Life</h3>
          <p>Experience extended mobility with long-lasting battery performance.</p>
        </div>
        <div class="feature-item">
          <i class="bi bi-gear"></i>
          <h3>Customizable Settings</h3>
          <p>Adjust the wheelchair settings to fit your personal preferences.</p>
        </div>
      </div>
    </section>
    
    <section class="benefits">
      <h2>Benefits</h2>
      <div class="benefit-list">
        <div class="benefit-item">
          <i class="bi bi-heart"></i>
          <h3>Enhanced Independence</h3>
          <p>Gain more independence and control over your mobility.</p>
        </div>
        <div class="benefit-item">
          <i class="bi bi-shield-check"></i>
          <h3>Improved Safety</h3>
          <p>Feel safer with integrated safety features and emergency support.</p>
        </div>
        <div class="benefit-item">
          <i class="bi bi-brightness-high"></i>
          <h3>Comfort & Convenience</h3>
          <p>Enjoy maximum comfort and convenience with ergonomic design.</p>
        </div>
      </div>
    </section>
    
    <section class="cta">
      <h2>Learn More</h2>
      <p>Ready to experience the future of mobility? Learn more about our smart wheelchairs and find the perfect model for you.</p>
      <button class="btn btn-primary">Explore Now</button>
    </section>
  </div>
</template>

<script>
export default {
  name: 'HomeView',
};
</script>

<style scoped>
.home-view {
  font-family: Arial, sans-serif;
  padding: 20px;
  background-color: #f5f5f5;
  color: #333;
}

header {
  text-align: center;
  padding: 40px 20px;
  background-color: #333;
  color: white;
  border-radius: 8px;
}

header h1 {
  margin-bottom: 10px;
}

header p {
  margin: 0;
  font-size: 1.2em;
}

.features, .benefits, .cta {
  margin: 40px 0;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

.feature-list, .benefit-list {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.feature-item, .benefit-item {
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 20px;
  text-align: center;
  width: 250px;
  margin: 10px;
}

.feature-item i, .benefit-item i {
  font-size: 2em;
  margin-bottom: 10px;
  color: #007bff;
}

.cta {
  text-align: center;
}

.cta button {
  padding: 10px 20px;
  font-size: 1.2em;
}
</style>
