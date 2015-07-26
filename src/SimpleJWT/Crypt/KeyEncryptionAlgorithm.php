<?php
/*
 * SimpleJWT
 *
 * Copyright (C) Kelvin Mo 2015
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above
 *    copyright notice, this list of conditions and the following
 *    disclaimer in the documentation and/or other materials provided
 *    with the distribution.
 *
 * 3. The name of the author may not be used to endorse or promote
 *    products derived from this software without specific prior
 *    written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 * GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN
 * IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace SimpleJWT\Crypt;

/**
 * Interface for key encryption algorithms.
 */
interface KeyEncryptionAlgorithm extends KeyManagementAlgorithm {
    /**
     * Encrypts a content encryption key.
     *
     * @param string $cek the content encryption key as a binary string
     * @param SimpleJWT\Keys\KeySet $keys the key set containing the key
     * to be used to encrypt the cek
     * @param array &$headers the JWE header, which can be modified by
     * implementing algorithms
     * @param string $kid the ID of the key to be used. If null the key will
     * be chosen automatically.
     * @return string the base64url encoded encrypted content encryption key
     * @throws SimpleJWT\Keys\KeyException if there is an error in obtaining the
     * key(s) required for this operation
     * @throws CryptException if there is an error in the cryptographic process
     */
    public function encryptKey($cek, $keys, &$headers, $kid = null);

    /**
     * Decrypts a content encryption key.
     *
     * @param string $encrypted_key the base64url encoded encrypted content encryption key
     * @param SimpleJWT\Keys\KeySet $keys the key set containing the key
     * to be used to encrypt the cek
     * @param array $headers the JWE header
     * @param string $kid the ID of the key to be used. If null the key will
     * be chosen automatically.
     * @return string the decrypted content encryption key as a binary string
     * @throws SimpleJWT\Keys\KeyException if there is an error in obtaining the
     * key(s) required for this operation
     * @throws CryptException if there is an error in the cryptographic process
     */
    public function decryptKey($encrypted_key, $keys, $headers, $kid = null);
}

?>
