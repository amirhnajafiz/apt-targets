package main

import (
	"bytes"
	"encoding/json"
	"errors"
	"log"
	"net/http"

	"github.com/labstack/echo/v4"
)

const (
	storeAddr = "http://localhost:10020/store"
)

type Model struct {
	Id    int         `json:"id"`
	Value interface{} `json:"value"`
}

func main() {
	e := echo.New()

	e.POST("/", func(c echo.Context) error {
		var m Model

		if err := c.Bind(&m); err != nil {
			return err
		}

		if m.Id < 1 {
			return errors.New("id field should be positive")
		}

		log.Println("[POST] request from webserver")

		go func() {
			var (
				client = http.Client{}
			)

			buffer, _ := json.Marshal(m.Value)

			req, _ := http.NewRequest(http.MethodPut, storeAddr, bytes.NewReader(buffer))
			req.Header.Add("Content-type", "application/json")

			if resp, er := client.Do(req); er != nil {
				e.Logger.Error(er)
			} else {
				log.Printf("[RESPONSE] storage status code: %d\n", resp.StatusCode)
			}
		}()

		return c.String(http.StatusCreated, "OK")
	})

	e.Logger.Fatal(e.Start(":10021"))
}
