class RailFenceCipher:
    def __init__(self):
        pass

    def rail_fence_encrypt(self, plain_text, num_rails):
        rails = ['' for _ in range(num_rails)]
        rail_index = 0
        direction = 1  # 1: down, -1: up

        for char in plain_text:
            rails[rail_index] += char
            if rail_index == 0:
                direction = 1
            elif rail_index == num_rails - 1:
                direction = -1
            rail_index += direction

        return ''.join(rails)

    def rail_fence_decrypt(self, cipher_text, num_rails):
        # Tính độ dài mỗi rail
        rail_lengths = [0] * num_rails
        rail_index = 0
        direction = 1

        for _ in range(len(cipher_text)):
            rail_lengths[rail_index] += 1
            if rail_index == 0:
                direction = 1
            elif rail_index == num_rails - 1:
                direction = -1
            rail_index += direction

        # Cắt cipher_text thành các rail
        rails = []
        index = 0
        for length in rail_lengths:
            rails.append(list(cipher_text[index:index+length]))
            index += length

        # Ghép lại theo thứ tự zigzag
        plain_text = ''
        rail_index = 0
        direction = 1

        for _ in range(len(cipher_text)):
            plain_text += rails[rail_index].pop(0)
            if rail_index == 0:
                direction = 1
            elif rail_index == num_rails - 1:
                direction = -1
            rail_index += direction

        return plain_text
