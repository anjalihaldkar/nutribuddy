from pathlib import Path
import re
root = Path('public/assets/css')
style = root / 'style.css'
resp = root / 'responsive.css'
text = style.read_text(encoding='utf-8')
blocks = []
new_text = ''
idx = 0
n = len(text)
pattern = re.compile(r'@media\b')
for m in pattern.finditer(text):
    start = m.start()
    if start < idx:
        continue
    brace = 0
    pos = start
    while pos < n:
        ch = text[pos]
        if ch == '{':
            brace += 1
        elif ch == '}':
            brace -= 1
            if brace == 0:
                end = pos + 1
                break
        pos += 1
    else:
        raise SystemExit(f'Unmatched brace at {start}')
    blocks.append(text[start:end])
    new_text += text[idx:start]
    idx = end
new_text += text[idx:]
print(f'Found {len(blocks)} media blocks')
style.write_text(new_text, encoding='utf-8')
resp_text = resp.read_text(encoding='utf-8')
if not resp_text.endswith('\n'):
    resp_text += '\n'
resp_text += '\n/* Extracted responsive rules from style.css */\n'
for b in blocks:
    resp_text += b + '\n\n'
resp.write_text(resp_text, encoding='utf-8')
print(f'Wrote {len(blocks)} blocks to {resp}')
