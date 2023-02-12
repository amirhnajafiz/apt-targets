package main

import (
	"net/http"

	"github.com/gofiber/fiber/v2"
)

type Model struct {
	Name          string `json:"name"`
	StudentNumber string `json:"student_number"`
}

var storage []Model

func main() {
	app := fiber.New()

	app.Get("/store", func(ctx *fiber.Ctx) error {
		return ctx.JSON(storage)
	})

	app.Put("/store", func(ctx *fiber.Ctx) error {
		var m Model

		if e := ctx.BodyParser(&m); e != nil {
			return e
		}

		storage = append(storage, m)

		return ctx.SendStatus(http.StatusCreated)
	})

	if er := app.Listen(":10020"); er != nil {
		panic(er)
	}
}
