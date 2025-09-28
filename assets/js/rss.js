
// Minimal RSS rendering (expects a JSON endpoint to avoid CORS)
async function loadRSS(url, targetId='rss-list'){
  try{
    const res = await fetch(url, {cache:'no-store'});
    if(!res.ok) throw new Error('RSS fetch failed');
    const items = await res.json();
    const wrap = document.getElementById(targetId);
    wrap.innerHTML = '';
    items.slice(0,6).forEach(it=>{
      const card = document.createElement('a');
      card.className = 'card reveal';
      card.href = it.link;
      card.target = '_blank';
      card.rel = 'noopener';
      card.innerHTML = `<h3>${it.title}</h3><p>${it.pubDate || ''}</p>`;
      wrap.appendChild(card);
    });
  }catch(e){
    console.warn('RSS error', e);
  }
}
// Example usage (unhide #news and set your proxy URL):
// document.getElementById('news').hidden = false;
// loadRSS('/rss-proxy.php?src=https://YOURBLOG/feed');
