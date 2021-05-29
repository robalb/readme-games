```jsx
import React, { useState } from 'react';
import 'styles.css';

function liveCode() {
  const [clicks, setClicks] = useState(0);
  return (
    <div>
      <p>Counter value: {clicks}</p>
      <button onClick={() => setClicks(clicks + 1)}>
        click here
      </button>
    </div>
  );
}
```


### Live result
  <a align="center" href="%action%increment">
    <img src="%resource%htmlbt">
  </a>
    <img src="%resource%counter">

