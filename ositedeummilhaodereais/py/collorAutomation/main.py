from PIL import Image
import pandas as pd
from bs4 import BeautifulSoup

# Dados para pintura
painter = pd.read_excel("painter.xlsx", header=0)

# Background básico
width, height = 1000, 1000
image = Image.new("RGB", (width, height), "white")

# Ler o arquivo HTML
with open("../../index.html", "r", encoding="utf-8") as file:
    soup = BeautifulSoup(file, "html.parser")

for area_tag in soup.find_all('area'):
    area_tag.decompose()

print("Area antiga excluida!")

pixel_counter = 0
for line in range(len(painter.index)):
    color_line = (painter.loc[line, "r"], painter.loc[line, "g"], painter.loc[line, "b"])
    for x in range(int(painter.loc[line, "x1"]), int(painter.loc[line, "x2"])):
        for y in range(int(painter.loc[line, "y1"]), int(painter.loc[line, "y2"])):
            image.putpixel((x, y), color_line)
            pixel_counter += 1
    new_area_soup = BeautifulSoup(painter.loc[line, "area"], "html.parser").area
    map_tag = soup.find('map')
    if map_tag:
        map_tag.append(new_area_soup)

print("Imagem pintada e nova area incluida!")

# Salva a imagem como PNG
image.save("../../img/background.png")
print("Pixels vendidos: " + str(pixel_counter))
print("Pixels para vender: " + str(1000000 - pixel_counter))

# Encontrar o link específico e atualizar o texto
link = soup.find('a', {'id': 'buy'})
print(link.text)
if link and "Pixels comprados:" in link.text:
    new_value = pixel_counter
    link.string = f"Pixels comprados: {new_value}"
link = soup.find('a', {'id': 'sell'})
if link and "Pixels disponiveis:" in link.text:
    new_value = 1000000 - pixel_counter
    link.string = f"Pixels disponiveis: {new_value}"

# Salvar o arquivo HTML atualizado
with open("../../index.html", "w", encoding="utf-8") as file:
    file.write(str(soup))