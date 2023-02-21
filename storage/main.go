package main

import (
	"log"
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
		log.Println("[GET] request from webserver")

		return ctx.JSON(storage)
	})

	app.Put("/store", func(ctx *fiber.Ctx) error {
		m := new(Model)

		if e := ctx.BodyParser(m); e != nil {
			log.Println(e)

			return e
		}

		log.Println("[PUT] request from manager")

		storage = append(storage, *m)

		return ctx.SendStatus(http.StatusCreated)
	})

	if er := app.Listen(":10020"); er != nil {
		panic(er)
	}
}
