(function(a){function b(a){f.has(a.target.href)||(d=setTimeout(function(){g.rel="prefetch",g.href=a.target.href,document.head.appendChild(g),d=void 0,f.insert(a.target.href)},100))}function c(){d?(clearTimeout(d),d=void 0):g.removeAttribute("href")}var d,f={data:[],ls:a.sessionStorage||!1,has:function(a){if(this.ls&&this.ls.getItem(a))return!0;return-1!=this.data.indexOf(a)},insert:function(a){this.ls?this.ls.setItem(a,!0):this.data.push(a)},erase:function(a){if("undefined"==a)this.ls?this.ls.clear():this.data=[];else if(this.ls)this.ls.removeItem(a);else{var b=this.data.indexOf(a);-1!==b&&this.data.splice(b,1)}}},g=document.createElement("link"),h=g.relList&&g.relList.supports&&g.relList.supports("prefetch");h&&document.querySelectorAll("[data-prefetch=\"true\"]").forEach(function(a){a.addEventListener("mouseover",b),a.addEventListener("mouseout",c)})})(this);