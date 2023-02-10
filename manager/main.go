package main

import (
	"errors"
	"net/http"

	"github.com/labstack/echo/v4"
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

		return c.String(http.StatusCreated, "OK")
	})

	e.Logger.Fatal(e.Start(":10021"))
}
