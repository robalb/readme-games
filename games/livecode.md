```jsx
import React, { useState } from 'react';

function liveCode() {
  const [clicks, setClicks] = useState(0);
  return (
    <div>
      <p>the button has been clicked {clicks} times</p>
      <button onClick={() => setClicks(clicks + 1)}>
        click here
      </button>
    </div>
  );
}
```

<p align="center">
  <a align="center" href="%action%increment">
    <img src="%resource%increment_bt">
  </a>
</p>
<p align="center">
  <img src="%resource%counter">
  <img src="%resource%last">
</p>

