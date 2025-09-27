/**
 * Lightweight canvas "sparks" animation.
 * Tries to be performant (caps particles on low-power devices).
 */
(function(){
  const canvas = document.querySelector('#sparks');
  if(!canvas) return;
  const ctx = canvas.getContext('2d', { alpha: true });
  const DPR = Math.min(window.devicePixelRatio || 1, 2);
  let w, h, particles=[], then=performance.now();
  let max = window.REDUCE_MOTION ? 40 : 120;

  function resize(){
    w = canvas.clientWidth; h = canvas.clientHeight;
    canvas.width = Math.floor(w*DPR); canvas.height = Math.floor(h*DPR);
    ctx.setTransform(DPR,0,0,DPR,0,0);
  }
  window.addEventListener('resize', resize, {passive:true});
  resize();

  function rnd(a,b){return a + Math.random()*(b-a)}
  function Particle(){
    this.reset();
  }
  Particle.prototype.reset = function(){
    this.x = w/2 + rnd(-w*0.15, w*0.15);
    this.y = h/2 + rnd(-h*0.1, h*0.1);
    const ang = rnd(0, Math.PI*2);
    const speed = rnd(0.4, 1.8);
    this.vx = Math.cos(ang)*speed;
    this.vy = Math.sin(ang)*speed - 0.4;
    this.life = rnd(1.2, 2.6);
    this.age = 0;
    this.size = rnd(1, 2.2);
    this.hue = rnd(25, 40);
  }
  function step(dt){
    ctx.clearRect(0,0,w,h);
    for(let i=particles.length-1;i>=0;--i){
      const p=particles[i];
      p.age += dt;
      if(p.age>p.life){ p.reset(); continue; }
      p.x += p.vx*60*dt; p.y += p.vy*60*dt; p.vy += 0.005*60*dt;
      const alpha = Math.max(0, 1 - p.age/p.life);
      ctx.beginPath();
      ctx.fillStyle = `hsla(${p.hue}, 100%, 60%, ${alpha})`;
      ctx.arc(p.x, p.y, p.size, 0, Math.PI*2);
      ctx.fill();
      // trails
      ctx.beginPath();
      ctx.strokeStyle = `hsla(${p.hue}, 100%, 60%, ${alpha*0.6})`;
      ctx.moveTo(p.x, p.y);
      ctx.lineTo(p.x - p.vx*4, p.y - p.vy*4);
      ctx.stroke();
    }
  }
  for(let i=0;i<max;i++) particles.push(new Particle());

  function raf(t){
    const dt = Math.min(0.05, (t-then)/1000); then=t;
    step(dt);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);
})();