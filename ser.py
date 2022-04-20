import ip_address as ip # получение ip компьютера в сети
address = ip.get() # сохранение ip в переменную
print(address)
# auther: ka1N
# Время создания: 2022.01.23 15.55




from fuzzywuzzy import fuzz

import sqlite3

coni = sqlite3.connect("license.licis")  # или :memory: чтобы сохранить в RAM
cur = coni.cursor()
cur.execute("SELECT * FROM licenses;")
one_result = cur.fetchall()


conn = sqlite3.connect(r'test-base-2.db', check_same_thread=False)
cur = conn.cursor()
command_list = cur.execute("SELECT * FROM command;").fetchall()
print(command_list)
def recognize_cmd(cmd):
    RC = {'cmd': '', 'percent': 0}
    for c, v in command_list:
        #print(c, v)
        #print(v)
        vrt = fuzz.ratio(cmd, v)

        if vrt > RC['percent']:
            RC['cmd'] = c
            RC['percent'] = vrt
    print(RC)
    ss = (str(RC['cmd'])+";"+str(RC['percent']))
    return ss
# Импортировать пакет сокетов
import socket, threading

# Создаем объект сокета
server = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

# Получить локальный ip
host = socket.gethostname()

# Данный порт
port = 9090

# Укажите IP и порт сервера
server.bind((address, port))

# Максимальное количество подключений
server.listen(5)
print('Enter Enter для выхода с сервера')

# Создайте список клиентов
clients = list()
clien_ip = list()
clien_port = list()
# Хранить клиентов, которые создали потоки
end = list()


# Блокировка ожидания подключения клиента, возврата объекта подключения и адреса косвенного объекта
def accept():
    while True:
        client, addr = server.accept()
        clients.append(client)
        print(client)
        #clients.append(clients)
        print(
            "\ r" + '-' * 5 + f'сервер подключен через {addr}: текущее количество подключений: ----- {len(clients)}' + '-' * 5,
            end='')  # Взаимодействие с другими людьми


def recv_data(client):
    while True:
        # Принимаем информацию от клиента
        try:
            indata = client.recv(10240)
        except Exception as e:
            print(end)
            print(client)
            clients.remove(client)
            end.remove(client)

            print("\ r" + '-' * 5 + f'Сервер отключен: текущее количество подключений: ----- {len(clients)}' + '-' * 5,
                  end='')
            break
        print(indata.decode('utf-8'))
        #print(client)
        for clien in clients:
            # Перенаправить информацию от клиента и отправить ее другим клиентам

            if clien == client:

                #print('l1')
                for row in one_result:
                    #print(row[0])
                    #print(indata.decode('utf-8').split(':')[0])
                    if row[0] == indata.decode('utf-8').split(':')[0]:
                        #
                        #print(lic)
                        cmd = indata.decode('utf-8').split(':')[1]
                        print(recognize_cmd(cmd))
                        #print('l2')
                        clien.send(str(recognize_cmd(cmd)).encode('utf-8'))
                        break

            #elif clien != client:
            #    clien.send(indata)





def outdatas():
    while True:

        # Введите информацию, которая будет предоставлена ​​клиенту
        print('')
        outdata = input('')
        print()
        if outdata == 'enter':
            break
            #print('Отправить всем:% s' % outdata)
            # Отправлять информацию каждому клиенту
        for client in clients:
            client.send(f"Сервер: {outdata}".encode('utf-8)'))


def indatas():
    while True:
        # Выполните цикл подключенных клиентов и создайте соответствующий поток
        for clien in clients:
            # Если поток уже существует, пропустить
            if clien in end:
                continue
            index = threading.Thread(target=recv_data, args=(clien,))
            index.start()
            end.append(clien)


# Создать многопоточность
# Создать получающую информацию, объект потока
t1 = threading.Thread(target=indatas, name='input')
t1.start()

# Создать отправляемое сообщение, объект потока

t2 = threading.Thread(target=outdatas, name='out')
t2.start()

# Ожидание подключения клиента, объект потока

t3 = threading.Thread(target=accept(), name='accept')
t3.start()

# Блокировать округ, пока подпоток не будет завершен, и основной поток не может закончиться
# t1.join()
t2.join()

# Выключите все серверы
for client in clients:
    client.close()
    print('-' * 5 + 'сервер отключен' + '-' * 5)